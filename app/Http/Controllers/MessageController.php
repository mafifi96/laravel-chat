<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    public function send(Request $request)
    {
        ##dd($request->all());

        $data = $request->validate([

            'message' => 'required|string|max:1000',
            'to' => 'required|integer',
        ]);

        //$data['from'] = Auth::id();

        $message = auth()->user()->messages()->create($data);


        return "message saved";

    }

    public function messages(Request $request)
    {

        $friend = $request->friend;

        $messages = Message::where([
            ['from', $friend],
            ['to', auth()->id()],
        ])
            ->orWhere([
                ['from', auth()->id()],
                ['to', $friend],
            ])
            ->get();

        return $messages;
    }


}
