<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat()
    {
        $client = new Client([
            'headers' => [
                'Authorization' => 'Bearer '.env('OPENAI_API_KEY'),
                'Content-Type' => 'application/json',
            ],
        ]);

        $response = $client->post('https://api.openai.com/v1/chat/completions', [
            'json' => [
                'model'=> 'text-davinci-003',
                'prompt'=> 'Say this is a test',
                'max_tokens'=> 7,
                'temperature'=> 0,
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        return $result['choices'][0]['text'];
    }
}
