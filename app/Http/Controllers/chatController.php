<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat()
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'headers' => [
                'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'model' => 'davinci',
                'prompt' => 'Hello, how are you?',
                'temperature' => 0.7,
                'max_tokens' => 50,
                'stop' => '\n'
                ]
            ]);
            $result = json_decode($response->getBody()->getContents(), true);
            $answer = $result['choices'][0]['text'];
            return $answer;
    }
}
