<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat()
    {
        $client = new Client();
        $response = $client->post('https://api.openai.com/v1/engine/davinci-codex/completions', [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            ],
            'json' => [
                'prompt' => 'hola como estas',
                'temperature' => 0.7,
                'max_tokens' => 60,
                'top_p' => 1,
                'n' => 1,
                'stop' => ['\n'],
            ],
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return response()->json($result['choices'][0]['text']);
    }
}
