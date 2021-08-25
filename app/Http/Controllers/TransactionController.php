<?php

namespace App\Http\Controllers;

use App\Events\TransactionReceived;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class TransactionController extends Controller
{
    public const PROVIDER_APPLE = 'apple';

    public function appleHandler(Request $request): Response
    {
        $data = $request->json()->all();
        try {
            event(new TransactionReceived($data, self::PROVIDER_APPLE));
        }catch(Exception $exception){
            return \response('Transaction not received',500);
        }
        return \response('Transaction received');
    }
}
