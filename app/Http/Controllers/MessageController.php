<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Events\MessageSent;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function show($conversationId)
    {
        $conversation = Conversation::find($conversationId);
        return response()->json($conversation->messages);
    }

    public function sendMessage(Request $request)
    {
        $conversation = Conversation::where('sender_id', $request->receiver_id)->orWhere('receiver_id', $request->receiver_id)->first();
        if (!$conversation) {
            $conversation = new Conversation([
                'sender_id' => $request->sender_id,
                'receiver_id' => $request->receiver_id
            ]);
        }
        $conversation->new_messages +=1;
        $conversation->save();
        $message = Message::create([
            'sender_id' => $request->sender_id,
            'receiver_id' => $request->receiver_id,
            'message' => $request->message,
            'conversation_id' => $request->conversation_id
        ]);
        broadcast(new MessageSent($message));
        return response()->json('sent');
    }
}
