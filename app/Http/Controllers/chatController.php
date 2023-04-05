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
            'model' => 'text-davinci-003', // Especifica el modelo de OpenAI que se utilizará para generar el texto
            'prompt' => $request->message, // Especifica el fragmento de texto que se usará como entrada para generar el texto
            'max_tokens' => 210, // Especifica el número máximo de "tokens" (palabras o caracteres) que se generarán en la respuesta
            'temperature' => 0.7 // Especifica el nivel de "temperatura" para el modelo (0 = sin aleatoriedad, 1 = completamente aleatorio)
        );
                $payload = json_encode($data);
                $ch = curl_init('https://api.openai.com/v1/completions');
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
