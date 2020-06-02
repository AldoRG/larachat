<?php

use App\ConversationUser;
use App\User;
use Illuminate\Database\Seeder;

class ConversationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Get default user to make test conversations.
        $user = User::first();
        factory('App\Conversation', 25)->create()->each(function ($conversation) use ($user){
            $conversation->chat()->save(ConversationUser::create([
                'user_id' => $user->id,
                'conversation_id' => $conversation->id
            ]));
            $conversation->chat()->save(ConversationUser::create([
                'user_id' => User::inRandomOrder()->first()->id,
                'conversation_id' => $conversation->id
            ]));
        });
    }
}
