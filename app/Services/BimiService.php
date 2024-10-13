<?php

declare (strict_types = 1);

namespace App\Services;

use App\Repositories\GeminiAIRepository;
use Illuminate\Support\Facades\Auth;

class BimiService
{
    public static function getResponse(string $message, array $context): string // Alterado para retornar apenas string
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

        return $botMessage; // Retorna apenas a mensagem do bot
    }

    private static function buildMessageWithContext(string $message, array $context): string
    {
        $purpose = $context['purpose'];
        $topics = implode(', ', $context['topics']);
        $tone = $context['conversation_tone']['formalidade'];
        $user = Auth::user();
        $contextualMessage = "Contexto:\nPropósito: $purpose\nTópicos: $topics\nTom: $tone\n\nUsuario: $user \n\nMensagem do Usuário: $message";

        return $contextualMessage;
    }
}

