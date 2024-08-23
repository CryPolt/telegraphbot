<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DefStudio\Telegraph\Telegraph;

class TelegramController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $update = $request->all();
        \Log::info('Received update: ', $update);

        $telegram = new Telegraph();

        // Пример: отправка ответа на полученное сообщение
        if (isset($update['message']['text'])) {
            $chatId = $update['message']['chat']['id'];
            $message = 'Вы отправили: ' . $update['message']['text'];

            $telegram->sendMessage([
                'chat_id' => $chatId,
                'text' => $message,
            ]);
        }

        return response()->json(['status' => 'success']);
    }
}
