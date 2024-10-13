<?php

declare (strict_types = 1);

namespace App\Repositories;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class GeminiAIRepository
{
    public static function getInfo(string $message): Response
    {
        $apiKey = env('GOOGLE_API_KEY');

        return Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash-latest:generateContent?key=$apiKey", [
            "contents" => [
                [
                    "parts" => [
                        [
                            "text" => $message
                        ]
                    ]
                ]
            ],
        ]);
    }
}
