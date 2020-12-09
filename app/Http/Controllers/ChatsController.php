<?php

namespace App\Http\Controllers;
use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pusher\Pusher;

class ChatsController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // select all users except logged in user
        //$users = User::where('id', '!=', Auth::id())->get();

        // count how many message are unread from the selected user
        // $users = DB::select("select users.id, users.name, users.avatar, users.email, count(is_read) as unread 
        // from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        // where users.id != " . Auth::id() . " 
        // group by users.id, users.name, users.avatar, users.email");

        // $users=User::leftJoin('messages','messages.user_id','=',Auth::id())->select("users.id, users.name, users.email, count(is_read)")->get();
        
        $users = DB::select("select users.id, users.name, users.email, count(is_read) as unread 
        from users LEFT  JOIN  messages ON users.id = messages.from and is_read = 0 and messages.to = " . Auth::id() . "
        where users.id != " . Auth::id() . " 
        group by users.id, users.name, users.email");


        return view('chat', ['users' => $users]);
  
    }

    public function getMessage($user_id)
    {
        $my_id = Auth::id();

        // Make read all unread message
        Message::where(['from' => $user_id, 'to' => $my_id])->update(['is_read' => 1]);

        // Get all message from selected user
        $messages = Message::where(function ($query) use ($user_id, $my_id) {
            $query->where('from', $user_id)->where('to', $my_id);
        })->oRwhere(function ($query) use ($user_id, $my_id) {
            $query->where('from', $my_id)->where('to', $user_id);
        })->get();

        return view('messages.index', ['messages' => $messages]);
    }

    public function sendMessage(Request $request)
    {
        $from = Auth::id();
        $to = $request->receiver_id;
        $message = $request->message;

        $data = new Message();
        $data->from = $from;
        $data->to = $to;
        $data->message = $message;
        $data->is_read = 0; // message will be unread when sending message
        $data->save();

        // pusher
        $options = array(
            'cluster' => 'ap2',
            'useTLS' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data = ['from' => $from, 'to' => $to]; // sending from and to user id when pressed enter
        $pusher->trigger('my-channel', 'my-event', $data);
    }
      //
  // public function __construct()
  //   {
  //     $this->middleware('auth');
  //   }

  // /**
  //  * Show chats
  //  *
  //  * @return \Illuminate\Http\Response
  //  */
  // public function index()
  //   {
  //     return view('chat');
  //   }

  // /**
  //  * Fetch all messages
  //  *
  //  * @return Message
  //  */
  // public function fetchMessages()
  //   {
  //     return Message::with('user')->get();
  //   }

  // /**
  //  * Persist message to database
  //  *
  //  * @param  Request $request
  //  * @return Response
  //  */
  // public function sendMessage(Request $request)
  //   {
  //     $user = Auth::user();

  //     $message = $user->messages()->create([
  //       'message' => $request->input('message')
  //     ]);

  //     broadcast(new MessageSent($user, $message))->toOthers();

  //     return ['status' => 'Message Sent!'];
  //   }
}
