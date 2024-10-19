<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Services\BimiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChatController extends Controller
{
    protected $bimiService;

    public function __construct(BimiService $bimiService)
    {
        $this->bimiService = $bimiService;
    }

    public function conversation(Request $request)
    {
        $response = $this->bimiService->getResponse($request->service, $request->message);
        $decodedResponse = json_decode($response, true);
        $replyText = $decodedResponse['candidates'][0]['content']['parts'][0]['text'] ?? 'Desculpe, não entendi sua solicitação.';

        session()->flash('reply', $replyText);

        return response()->json(['reply' => $replyText]);
    }

    public function endChat(Request $request)
    {
        // Validar dados recebidos
        $data = $request->validate([
            'chatHistory' => 'required|array',
            'service' => 'required|array',
        ]);

        $chatHistory = $data['chatHistory'];
        $serviceName = $data['service']['name'];

        // Montar o conteúdo da conversa
        $content = "Conversa com o serviço: $serviceName\n\n";
        foreach ($chatHistory as $chat) {
            $content .= "Usuário: {$chat['user']}\n";
            $content .= "Bot: {$chat['bot']}\n\n";
        }

        // Definir o nome do arquivo com data/hora para evitar duplicidades
        $filename = 'chat_conversation_' . now()->format('Y-m-d_H-i-s') . '.txt';

        // Gravar o arquivo no storage/app
        Storage::put("conversations/{$filename}", $content);

        return response()->json(['message' => 'Conversa gravada com sucesso']);
    }
}
