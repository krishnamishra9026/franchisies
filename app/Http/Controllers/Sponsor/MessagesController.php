<?php

namespace App\Http\Controllers\Sponsor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Creator;
use Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsor =  Creator::where('id', auth()->user()->id)->first();
        $users =  Creator::get(['username', 'id', 'avatar', 'firstname', 'lastname']);
        $id = Creator::first()->id;
        $creator = Creator::first();
        $sender_id = auth()->user()->id;

        $messages = ChatMessage::where(['sender_reseptent' => 'Sponsor_'.$sender_id.'Creator_'.$id])->orWhere(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id])->get();

        ChatMessage::where(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id])->update(['seen' => 1]);

        foreach ($users as $key => $user) {   
            $creator = $user;      
            $users[$key]->message = '';
            $users[$key]->last_message_at = '';
            $last_data = ChatMessage::latest('id')->where(['sender_reseptent' => 'Creator_'.$user->id.'Sponsor_'.$sender_id])->orWhere(['sender_reseptent' => 'Sponsor_'.$sender_id.'Creator_'.$user->id])->first();
            if ($last_data) {
                $users[$key]->message = $last_data->message;
                $users[$key]->last_message_at = date('H:i', strtotime($last_data->created_at));
            }else{
                unset($users[$key]);
            }
        }

        $creator = [];
        foreach ($users as $key => $user) {
            $creator =  Creator::where('id', $user->id)->first();
            break;
        }

        return view('sponsor.messages.index',compact('sponsor', 'users', 'messages', 'id', 'creator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {        
        $receiver_id = $request->receiver_id;
        $receiver = Creator::where('id', $receiver_id)->first();
        $sender_id = auth()->user()->id;
        $sponsor = auth()->user();
        if (Chat::where(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'sponsor', 'receiver' => 'creator'])->exists()) {
           $chat_id = Chat::where(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'sponsor', 'receiver' => 'creator'])->value('id');
        }else{
            $chat = Chat::create(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'sponsor', 'receiver' => 'creator']);
            $chat_id = $chat->id;
        }

        $conversation = new ChatMessage;
        $conversation->user_id = auth()->user()->id;
        $conversation->message = $request->message;
        $conversation->message_to = $receiver_id;
        $conversation->message_from = $sender_id;

        if($request->hasfile('file')){

            $image = $request->file('file');

            $name = $image->getClientOriginalName();

            $image->storeAs('uploads/messages/sponsors/'.auth()->user()->id.'/', $name, 'public');

            $conversation->file = $name;

        }

        $conversation->sender = 'sponsor';
        $conversation->receiver = 'creator';
        $conversation->sender_reseptent = 'Sponsor_'.$sender_id.'Creator_'.$receiver_id;
        $conversation->message = $request->message;
        $conversation->flex = ( Auth::user() == null) ? 0 : 1;
        $conversation->chat_id = $chat_id;
        $conversation->save();

        $message = $conversation;

        return $html = view('sponsor.messages.ajax_send',compact('message', 'sponsor'))->render();

        return redirect()->back()->with('success', 'message sended successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sponsor =  Creator::where('id', $id)->first();
        $users =  Creator::get(['username', 'id', 'avatar', 'firstname', 'lastname']);
        $sender_id = auth()->user()->id;

        ChatMessage::where(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id])->update(['seen' => 1]);

        $messages = ChatMessage::where(['sender_reseptent' => 'Sponsor_'.$sender_id.'Creator_'.$id])->orWhere(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id])->get();

        foreach ($users as $key => $user) {
            $users[$key]->message = '';
            $users[$key]->last_message_at = '';
            $last_data = ChatMessage::latest('id')->where(['sender_reseptent' => 'Creator_'.$user->id.'Sponsor_'.$sender_id])->orWhere(['sender_reseptent' => 'Sponsor_'.$sender_id.'Creator_'.$user->id])->first();
            if ($last_data) {
                $users[$key]->message = $last_data->message;
                $users[$key]->last_message_at = date('H:i', strtotime($last_data->created_at));
            }else{
                unset($users[$key]);
            }
        }

        return view('sponsor.messages.show',compact('sponsor', 'users', 'id' , 'messages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function getConversations(Request $request)
    {
        $id = $request->id;

        $sponsor =  Creator::where('id', $id)->first();

        $sender_id = auth()->user()->id;

        $messages = ChatMessage::where('seen',0)->where(function($query) use($sender_id, $sponsor, $id) {
            $query->where(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id]);
        })->get();

        $html = view('sponsor.messages.ajax',compact('messages', 'sponsor'))->render();

        ChatMessage::where(['sender_reseptent' => 'Creator_'.$id.'Sponsor_'.$sender_id])->update(['seen' => 1]);


        return $html;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    function getUnReadSponserMessages()
    {
        $user = auth()->user();

        $messages = collect();

        if($user){
            $messages = ChatMessage::where('seen',0)->where(function($query) use($user) {
                $query->where(['sender' => 'Creator', 'receiver' => 'Sponsor', 'message_to' => $user->id]);
            })->count();
        }

        return $messages;
    }

}
