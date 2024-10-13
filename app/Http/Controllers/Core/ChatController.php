<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Services\BimiService;
use Illuminate\Http\Request;

class ChatController  extends Controller
{
    public function conversation(Request $request)
    {
        $chatHistory = session('chatHistory', []);
        $contextPath = resource_path('assets/jsons/chat-context.json');
        $context = json_decode(file_get_contents($contextPath), true);

        // Obtendo apenas a resposta do bot
        $botMessage = BimiService::getResponse($request->message, $context);

        // Adicionando as mensagens ao histórico de chat
        $chatHistory[] = [
            'user' => $request->message,
            'bot' => $botMessage,
        ];

        // Salvando o histórico na sessão
        session(['chatHistory' => $chatHistory]);
        // Retornando a view com o histórico de chat

        return inertia('Dashboard/Home', [
            'chatHistory' => $chatHistory,
        ]);
    }
}
