<?php

namespace App\Http\Controllers\Creator;

use App\Http\Controllers\Controller;
use App\Models\Creator;
use App\Models\User;
use App\Models\Chat;
use App\Models\ChatMessage;
use Illuminate\Http\Request;
use Auth;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:creator');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {              
        $creator =  User::where('id', auth()->guard('creator')->id())->first();

        $users =  User::get(['username', 'id', 'avatar', 'first_name', 'last_name']);

        $sponsor = User::first();

        $id = User::first()->id;

        $sender_id = auth()->user()->id;

        $messages = ChatMessage::where(['sender_reseptent' => 'Creator_'.$sender_id.'Sponsor_'.$id])->orWhere(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id])->get();

        ChatMessage::where(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id])->update(['seen' => 1]);

        foreach ($users as $key => $user) {
            $last_data = ChatMessage::latest('id')->where(['sender_reseptent' => 'Sponsor_'.$user->id.'Creator_'.$sender_id])->orWhere(['sender_reseptent' => 'Creator_'.$sender_id.'Sponsor_'.$user->id])->first();
            if ($last_data) {
                $users[$key]->message = $last_data->message;
                $users[$key]->last_message_at = date('H:i', strtotime($last_data->created_at));
            }else{
                unset($users[$key]);
            }
        }

        $sponsor = collect();
        foreach ($users as $key => $user) {
            $sponsor =  User::where('id', $user->id)->first();
            break;
        }

        if (!isset($sponsor) && empty($sponsor)) {
            return view('creator.message.message_empty',compact('users', 'creator', 'messages', 'id', 'sponsor'));
        }

        return view('creator.message.message',compact('users', 'creator', 'messages', 'id', 'sponsor'));
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
        $reciver = User::where('id', $receiver_id)->first();
        $sender_id = auth()->user()->id;
        $sponsor = auth()->user();
        if (Chat::where(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'creator', 'receiver' => 'sponsor'])->exists()) {
           $chat_id = Chat::where(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'creator', 'receiver' => 'sponsor'])->value('id');
        }else{
            $chat = Chat::create(['sender_id' =>$sender_id, 'receiver_id' => $receiver_id, 'sender' => 'creator', 'receiver' => 'sponsor']);
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

            $image->storeAs('uploads/messages/creators/'.auth()->user()->id.'/', $name, 'public');

            $conversation->file = $name;

        }

        $conversation->sender = 'creator';
        $conversation->receiver = 'sponsor';
        $conversation->sender_reseptent = 'Creator_'.$sender_id.'Sponsor_'.$receiver_id;
        $conversation->message = $request->message;
        $conversation->flex = ( Auth::user() == null) ? 0 : 1;
        $conversation->chat_id = $chat_id;
        $conversation->save();

        $message = $conversation;

        return $html = view('creator.message.ajax_send',compact('message', 'sponsor'))->render();

        return redirect()->back()->with('success', 'message sended successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $creator =  User::where('id', $id)->first();
        $users =  User::get(['username', 'id', 'avatar', 'first_name', 'last_name']);
        $sender_id = auth()->user()->id;

        ChatMessage::where(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id])->update(['seen' => 1]);

        $messages = ChatMessage::where(['sender_reseptent' => 'Creator_'.$sender_id.'Sponsor_'.$id])->orWhere(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id])->get();


        foreach ($users as $key => $user) {
            $last_data = ChatMessage::latest('id')->where(['sender_reseptent' => 'Sponsor_'.$user->id.'Creator_'.$sender_id])->orWhere(['sender_reseptent' => 'Creator_'.$sender_id.'Sponsor_'.$user->id])->first();
            if ($last_data) {
                $users[$key]->message = $last_data->message;
                $users[$key]->last_message_at = date('H:i', strtotime($last_data->created_at));
            }else{
                unset($users[$key]);
            }
        }

        return view('creator.message.message-show',compact('users', 'creator', 'id', 'messages'));
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getConversations(Request $request)
    {
        $id = $request->id;

        $sponsor =  User::where('id', $id)->first();

        $sender_id = auth()->user()->id;

        $messages = ChatMessage::where('seen',0)->where(function($query) use($sender_id, $sponsor, $id) {
            $query->where(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id]);
        })->get();

        $html = view('creator.message.ajax',compact('messages', 'sponsor'))->render();

        ChatMessage::where(['sender_reseptent' => 'Sponsor_'.$id.'Creator_'.$sender_id])->update(['seen' => 1]);

        return $html;
    }

    function getUnReadCreatorMessages()
    {
        $user = auth()->guard('creator')->user();

        $messages = ChatMessage::where('seen',0)->where(function($query) use($user) {
            $query->where(['sender' => 'Sponsor', 'receiver' => 'Creator', 'message_to' => $user->id]);
        })->count();

        return $messages;
    }
}
