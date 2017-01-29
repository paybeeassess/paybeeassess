<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/paybeebot', function(){

    return ('Hello this is a bot');
});

/**
 *
 */
Route::get('/displayfeedback', function(){

    return('Test display');
});


/**
 * We get the update from our bot
 */

Route::get('get-updates', 'TelegramController@getUpdates');

/**
 * Our bot sent a message
 */

Route::get('send-message', 'TelegramController@getSendMessage');
/**
 * we post a message sent
 */
Route::get('send-message-post', 'TelegramController@postSendMessage');

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/sendmessage', function(){
    $botToken = "238881504:AAHUN0OE_mCJSaQG0L79ECOfOMPd_863Gok";

    /**
     * The website we are going to access
     * @var $website
     * @var $botToken
     */
    $website = "https://api.telegram.org/bot".$botToken;


    /**
     * Update our variable
     * @var $website
     */

    $update = file_get_contents($website."/getupdates");

//Display the update on the website

//print_r($update);

//we create our array to output jsonobject into it
    $output_array = json_decode($update, true);

//print_r ($output_array);

    $text = $output_array["result"][0]["message"]["text"];
    $chatId  = $output_array ["result"][0]["message"]["chat"]["id"];

//print_r($text);
//print_r($chatId);

    file_get_contents($website."/sendmessage?chat_id=".$chatId."&text=HelloBenedict");

});

Route::get('/getvalue','TelegramControllerCalculate@getCurrency' );

Route::get('bot-config', 'TelegramController@botconfig');
