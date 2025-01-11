<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Events\MessageSent;
use Carbon\Carbon;
use Validator;
use App\Models\User;
use App\Models\Message;

class MessageController extends Controller
{

    public function sendMessage(Request $request)
    {
        // Validate the form input
        $data = $request->validate([
            'message' => 'required',
            'recipient_id' => 'required|exists:users,id'
        ]);

        // Create a new message
        // $message = auth()->user()->create([
        //     'message' => $data['message'],
        //     'recipient_id' => $data['recipient_id']
        // ]);
        $message = Message::create([
            'message' => $data['message'],
            'sender_id' => auth()->id(),
            'recipient_id' => $data['recipient_id']
        ]);


        if ($message) {
            // Broadcast the MessageSent event privately to the recipient user

            // broadcast(new MessageSent($message, $data['recipient_id']));

            return redirect()->back()->with('status', 'Message Sent Successfully!');
        } else {
            return redirect()->back()->withErrors(['Failed to send message.']);
        }
    }


    public function showMessages(string $recipientId)
    {
        $currentUser = Auth::user();
        $recipientUser = User::findOrFail($recipientId);

        // Fetch all messages for the current chat (between $currentUser and $recipientUser)
        $messages = Message::where(function ($query) use ($currentUser, $recipientUser) {
            $query->where('sender_id', $currentUser->id)
                ->where('recipient_id', $recipientUser->id);
        })->orWhere(function ($query) use ($currentUser, $recipientUser) {
            $query->where('sender_id', $recipientUser->id)
                ->where('recipient_id', $currentUser->id);
        })->orderBy('created_at')
            ->get();

        // Update the read status of the messages that belong to the recipient
        foreach ($messages as $message) {
            if ($message->recipient_id === $currentUser->id && !$message->is_read) {
                $message->update(['is_read' => true]);
            }
        }

        return view('chat.chat', [
            'users' => $currentUser, // Pass the authenticated user as 'users' to the view
            'messages' => $messages,
            'recipientId' => $recipientId,
        ]);
    }
}
