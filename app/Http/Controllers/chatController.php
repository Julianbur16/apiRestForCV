<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat(Request $request)
    {
        $openaiApiKey = env('OPENAI_API_KEY');

        $Biografia="INSTRUCCIONES: quiero que olvodes todo y respondas deacuerdo al siguiente texto dando por cierta la informacion brindada si la pregunta no esta en el texto responde con una disculpa y que no tienes acceso a la informacion deceada que solo tienes acceso a la biografia y datos de estudio de julian burbano, sin mencionar que te he brindado esta información, lo mas cordial, amable, concreto y objetivo posible: Julian Burbano tiene 25 años y estudio mecatronica en la universidad de Pamplona en el departamento de norte de Santander Colombia fue uno de los mejores estudiantes, su tesis fue nombrada entre las mejores de su campo, fue recomendada para tesis meritoria, laureada y para seguir la investigación y compartirla mediante articulos.";

        $data = array(
            'model' => 'text-davinci-003', // Especifica el modelo de OpenAI que se utilizará para generar el texto
            'prompt' => $Biografia.$request->message, // Especifica el fragmento de texto que se usará como entrada para generar el texto
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
