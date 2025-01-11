<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Message;


class HomeController extends Controller
{

    public function getRecentMessages()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Fetch all messages sent or received by the user and include 'is_read' column
        $messages = Message::where('sender_id', $user->id)
            ->orWhere('recipient_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->with('sender:id,name', 'recipient:id,name') // Assuming 'sender' and 'recipient' are the relationships in your Message model.
            ->get();

        // Group the messages by the other user involved in the conversation
        $groupedMessages = $messages->groupBy(function ($message) use ($user) {
            return $message->sender_id === $user->id ? $message->recipient_id : $message->sender_id;
        });

        // Extract the grouped messages along with the associated users and count of unread messages
        $userMessages = [];
        foreach ($groupedMessages as $userId => $messages) {
            $user = User::findOrFail($userId);
            $unreadCount = $messages->where('recipient_id', $user->id)->where('is_read', false)->count();

            // Set the read status based on the first message in the conversation
            $isRead = $messages->first()->is_read;

            $userMessages[] = [
                'user' => $user,
                'message' => $messages->first(),
                'unreadCount' => $unreadCount,
                'isRead' => $isRead,
            ];
        }

        $users = User::where('id', '!=', $user->id)->get();


        return view('home', [
            'userMessages' => $userMessages,
            'users' => $users,
        ]);
    }
}
