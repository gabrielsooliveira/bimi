<?php

declare (strict_types = 1);

namespace App\Services;

use App\Models\ConversationHistory;
use App\Repositories\GeminiAIRepository;
use Illuminate\Support\Facades\Auth;

class BimiService
{
    public static function getResponse(string $message, array $context): string
    {
        $fullMessage = self::buildMessageWithContext($message, $context);

        // Chamando o repositório para obter a resposta
        $items = GeminiAIRepository::getInfo($fullMessage);

        // Convertendo a resposta para um array
        $response = $items->json();

        // Extraindo apenas o texto da resposta
        $botMessage = '';
        if (isset($response['candidates'][0]['content']['parts'][0]['text'])) {
            $botMessage = trim($response['candidates'][0]['content']['parts'][0]['text']);
        }

        // Salvando o histórico da conversa
        self::saveConversationHistory(Auth::id(), $message, $botMessage);

        return $botMessage; // Retorna apenas a mensagem do bot
    }

    private static function buildMessageWithContext(string $message, array $context): string
    {
        $purpose = $context['purpose'];
        $topics = implode(', ', $context['topics']);
        $tone = $context['conversation_tone']['formalidade'];

        // Obtendo o usuário logado
        $user = Auth::user();
        $userName = $user->name;
        $userEmail = $user->email;
        $userRole = $user->role; // Exemplo de papel do usuário

        // Construindo o contexto com os dados do usuário
        $contextualMessage = "Contexto:\nPropósito: $purpose\nTópicos: $topics\nTom: $tone\n\nUsuário: Nome: $userName, Email: $userEmail, Role: $userRole\n\nMensagem do Usuário: $message";

        return $contextualMessage;
    }


    private static function saveConversationHistory(int $userId, string $message, string $response): void
    {
        ConversationHistory::create([
            'user_id' => $userId,
            'message' => $message,
            'response' => $response,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}

