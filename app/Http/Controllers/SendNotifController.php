<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Ladumor\OneSignal\OneSignal;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Cookie;

class SendNotifController extends Controller
{
    public function send()
    {
        $fields['include_player_ids'] = ['24d73e23-ad82-41e0-b30f-a29d70cc642c'];
        $message = 'hey!! this is test push.!';
    
        OneSignal::sendPush($fields, $message);
        OneSignal::getNotification($notificationId);
    }

    public function getSingleNotification($notificationId){

        OneSignal::getNotification($notificationId);
    }

    public function getAllNotification(){

        OneSignal::getNotifications();
    }
}
