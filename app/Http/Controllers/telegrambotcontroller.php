<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class telegrambotcontroller extends Controller
{
    //


    public function getCurrency()
    {
        $api = "http(s)://api.coindesk.com/v1/bpi/currentprice.json";

        $json = file_get_contents($api);
        $data = json_decode($json, TRUE);
      return  data('view-currency');
    }
}