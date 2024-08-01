<?php

namespace App\Http\Controllers;

use App\User;
use App\Message;
use App\MessageComment;
use Illuminate\Http\Request;
use Auth;
use DB;
use Log;

class MessagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $conversation = new MessageComment;
        $conversation->user_id = Auth::user()->id;
        $conversation->message = $request->message;
        $conversation->message_id = $request->message_id;
        $conversation->save();

        $conversation['user_name'] = Auth::user()->name;

        $this->emit_pusher_notification('message-channel', 'new-message', $conversation);

        // Log::info('Message broadcasted', ['message' => $conversation]);

        return response()->json($conversation);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user = null)
    {
        $auth_user = Auth::user()->id;
        if (Auth::user()->role != "3") {
            return redirect("/");
        }

        $get_last_post = DB::table('posts')->where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();
        if($user != null) {
            // check if user and auth already have a message if not create
            if(Message::where(['sender_id'=> $auth_user, 'receiver_id'=> $user])->first()){

                $message_info = Message::where(['sender_id'=> $auth_user, 'receiver_id'=> $user])->first();

            }else if(Message::where(['sender_id'=> $user, 'receiver_id'=> $auth_user])->first()){

                $message_info = Message::where(['sender_id'=> $user, 'receiver_id'=> $auth_user])->first();
            }
            else {
                $message_info = Message::create(
                    [
                    'sender_id' => Auth::user()->id,
                    'receiver_id' => $user
                    ]
                );
            }
        }else{
            $message_info = '';
        }

        $user_messages = User::where('id','!=',Auth::user()->id)->get();

        $user = User::where('id', $user)->first();

        $conversations =  MessageComment::where(['message_id'=> $message_info->id])->get();

        return view('chats', compact('user_messages', 'conversations', 'message_info', 'get_last_post', 'user'));

    }

     public function getConversations(Request $request)
    {
       $conversations =  MessageComment::where(['message_id'=>$request->id])->with('user')->get();
        return $conversations;
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function emit_pusher_notification ($channel, $event, $data) {
        try {
            $pusher = new \Pusher\Pusher('81a6b65c44dbb01b4a83', 'db18aefd21e737c0d34f', '1842920', [
                'cluster' => 'us2',
                'useTLS' => true
            ]);

            $pusher->trigger($channel, $event, $data);

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
