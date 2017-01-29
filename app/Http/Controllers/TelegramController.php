<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuniate\Support\Facades\Validator;
use Telegram\Bot\Laravel\Facades\Telegram;

class TelegramController extends Controller
{
    // we get the view that return to our first page
    public function getHome()
    {
        return view('home');
    }

     // We get updates from our bot
     public function getUpdates()
     {
         $updates = Telegram::getUpdates();
         dd($updates);
     }

     // Our bot send a message
     public function getSendMessage()
     {
         return view('send-message');
     }

     //We can post a message sent by our bot

     public function postSendMessage(Request $request)
     {
         $rules_bot = [
             'message' => 'required'

         ];
         $validator = Validator::make($request -> all(), $rules_bot);
         //test if  we fail to validate
         if ($validator -> fails())
         {
              //then we  redirect back
              return redirect()-> back()
                  ->with('status', 'Oops there is something wrong')
                  ->with('message', 'Message is required');
         }
         Telegram::sendMessage([
              'chat_id'=> env('GROUP_ID'),
             'text' => $request-> get('message')
             ]);
         // we redirect
         return redirect()->back()
             ->with('status', 'success')
             ->with('message', 'message sent');
     }



}
