<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\ConversationUser;
use App\Events\MessageSent;
use App\Message;
use App\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($conversationId)
    {
        $conversation = Conversation::with('messages')->find($conversationId);
        return response()->json($conversation->messages);
    }

    public function sendMessage(Request $request)
    {
        $message = new Message([
            'user_id' => $request->user_id,
            'message' => $request->message
        ]);
        $conversation = Conversation::findOrNew($request->conversation_id);
        if (!$conversation->exists) {
            $conversation->save();
            $conversation->chat()->save(ConversationUser::create([
                'user_id' => $request->user_id,
                'conversation_id' => $conversation->id
            ]));
            $conversation->chat()->save(ConversationUser::create([
                'user_id' => $request->receiver_id,
                'conversation_id' => $conversation->id
            ]));
        }
        $conversation->messages()->save($message);
        $message->sendMessageNotifications();
        return response()->json('sent');
    }
}
