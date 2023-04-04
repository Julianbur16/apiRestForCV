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

        $response = $client->post('https://api.openai.com/v1/engines/davinci-codex/completions', [
            'json' => [
                'prompt' => 'Hello, how are you?',
                'max_tokens' => 50,
                'temperature' => 0.7,
                'stop' => ['\n']
            ],
        ]);

        $result = json_decode($response->getBody(), true);

        return $result['choices'][0]['text'];
    }
}
