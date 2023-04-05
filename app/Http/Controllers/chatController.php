<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat(Request $request)
    {
        $openaiApiKey = env('OPENAI_API_KEY');
        $data = array(
            'model' => 'gpt-3.5-turbo',
            'messages' => array(
                array(
                    'role' => 'user',
                    'content' => $request->message
                    )
                    )
                );
                $payload = json_encode($data);
                $ch = curl_init('https://api.openai.com/v1/chat/completions');
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Authorization: Bearer '.$openaiApiKey
                ));
                $result = curl_exec($ch);
                curl_close($ch);
                return $result;
    }
    
}
