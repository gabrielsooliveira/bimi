<?php

namespace App\Services;

use App\Repositories\GeminiAIRepository;
use Illuminate\Support\Facades\Auth;

class BimiService
{
    protected $geminiRepository;

    public function __construct(GeminiAIRepository $geminiRepository)
    {
        $this->geminiRepository = $geminiRepository;
    }

    public function getResponse(Array $service, string $userMessage): string
    {
        $context = $this->buildPrompt($service);
        $prompt = "$context . Mensagem do usuario: $userMessage";
        $reply = $this->geminiRepository->getInfo($prompt);

        return $reply ?? 'Desculpe, ocorreu um erro ao processar sua solicitação.';
    }

    private function buildPrompt(Array $service): string
    {

        $user = Auth::guard($service['slug'])->user();
        $objectService = json_decode(json_encode($service));

        return "
            Você é BIMI, um assistente virtual especializado em $objectService->description para a empresa $objectService->name.
            Seu objetivo principal é  oferecendo suporte técnico dentro das seguintes regras:

            1. Você **pode fornecer**: Visualizar Fatura, Informar Problema do sistema, Fornecer informações sobre o plano do usuario, Problema de pagamento.
            2. Você **não pode fornecer**: Nada que fuja da descricao da empresa.
            3. Você **deve redirecionar**: Caso a informação você não tenha ou seja algo que você não pode fornecer fale uma resposta objetiva de que vai enviar informações para  a equipe especializada da BEMOBI.

            O cliente atual se chama $user->name, do email $user->email. Utilize o email apenas para caso em que voce deve redirecionar o problema para a equipe especializada.
            O tom da conversa deve ser **formal**, com as seguintes características: sem emotis apenas texto com informações objetivas.

            Personalização:
            - Usar o nome do cliente nas respostas: Não, apenas na primeira resposta.

            Baseando-se nessas informações, por favor, responda à seguinte mensagem do cliente de forma adequada.
        ";
    }

}
