<?php

namespace App\Services;

use App\Repositories\GeminiAIRepository;

class BimiService
{
    protected $geminiRepository;

    public function __construct(GeminiAIRepository $geminiRepository)
    {
        $this->geminiRepository = $geminiRepository;
    }

    public function getResponse(object $service, string $userMessage): string
    {
        $prompt = $this->buildPrompt($service);
        $reply = $this->geminiRepository->getInfo($prompt, $userMessage);

        return $reply ?? 'Desculpe, ocorreu um erro ao processar sua solicitação.';
    }

    private function buildPrompt(object $service): string
    {
        return "Você é um assistente virtual especializado no serviço $service. Responda apenas sobre esse serviço.";
    }
}
