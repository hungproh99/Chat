<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use App\Message;
 
class MessageController extends Controller
{
 
    public function index()
    {
        if ($messages = Redis::get('messages.all')) {
            return json_decode($messages);
        }
        $messages = App\Message::with('user')->get();
        Redis::set('messages.all', $messages);
 
        return view('welcome');
    }
 
    public function store()
    {
        $user = Auth::user();
        $message = App\Message::create(['message'=> request()->get('message'), 'user_id' => $user->id]);
        broadcast(new MessagePosted($message, $user))->toOthers();
 
        return $message;
    }
    
}