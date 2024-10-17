<?php

namespace App\Http\Controllers\Core;

use App\Http\Controllers\Controller;
use App\Services\BimiService;
use Illuminate\Http\Request;

class ChatController  extends Controller
{
    protected $bimiService;

    public function __construct(BimiService $bimiService)
    {
        $this->bimiService = $bimiService; // Injetar o serviço
    }

    public function conversation(Request $request)
    {
        // Chama o serviço para processar a mensagem
        $reply = $this->bimiService->getResponse($request->service, $request->input('message'));
        return response()->json(['reply' => $reply]);
    }
}
