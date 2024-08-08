<?php

namespace App\Functions;

use App\Models\Token;

class PushNotification
{
    public static function send($message, $data, $client_id = null )
    {
        $headers = [];
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: key=' . env('FCM');
        foreach (Token::when($client_id != NULL, function ($query) use($client_id) {
                    return $query->where('client_id', $client_id);
                })->pluck('device_token') as $token) {
            $notification = [
                'to' => $token,
                'notification' => [
                    'title' => env('APP_NAME'), 
                    'body' => $message, 
                    'sound' => 'default', 
                    'badge' => '1',
                ], 
                'priority' => 'high', 
                "data" => $data, 
                "content_available" => true
            ];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($notification));
            $response = curl_exec($ch);
            dd($response);
            if ($response === FALSE){
                \Illuminate\Support\Facades\Log::debug('FCM Send Error: ' . curl_error($ch));
                die('FCM Send Error: ' . curl_error($ch));
            }
            curl_close($ch);
        }
    }
}
