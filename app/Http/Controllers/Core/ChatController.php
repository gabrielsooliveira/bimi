<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Services\BimiService;
use Illuminate\Http\Request;

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
}
