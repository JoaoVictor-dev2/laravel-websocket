<?php

namespace App\Http\Controllers;

use App\Events\Chat\Message;
use App\Events\Chat\MessageEvent;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller {

    public function send(Request $request) {

        $json = $request->getContent();

        $data = json_decode($json, true);

        if (json_last_error() == JSON_ERROR_NONE && isset($data['text']) && !empty($data['text'])) {

            $text = $data['text'];

            MessageEvent::dispatch($text);

            return $text;

        } else {
            return response('Erro', Response::HTTP_BAD_REQUEST);
        }
    }
}
