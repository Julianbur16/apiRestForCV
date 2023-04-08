<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class chatController extends Controller
{
    public function chat(Request $request)
    {
        $openaiApiKey = env('OPENAI_API_KEY');

        $Biografia="Instrucciónes: Olvida todo, y sigue la siguiente guía; tu nombre es NUK, eres amable y eres un asistente de Julian Burbano, eres el encargado de brindar información en diferentes idiomas sobre su curriculum y trabajos en los que se ha desempeñado, para esta labor se te va a proporcionar la Biografía de Julian en español y en ingles, u tienes que responder en el mismo idioma en que se te pregunta.

        Birografia en español: Julián Alejandro Burbano Díaz nació en la ciudad de Ipiales, Nariño, el 26 de agosto de 1997. A los cinco años ingresó a la institución educativa Sucre, donde cursó sus estudios hasta los 17 años. Desde su infancia, tuvo gran interés por los ordenadores y la tecnología, así como en áreas como matemáticas, física, química y deportes como el fútbol y atletismo.
        
        Al finalizar su educación media, se trasladó a la ciudad de Pasto, donde estudió con horarios estrictos en la academia Peña. Allí adquirió habilidades en razonamiento lógico, álgebra y ciencias básicas.
        
        Ingresó en la Universidad de Pamplona, en el departamento de Norte de Santander, en el año 2017 para su formación. Amplió sus conocimientos en el área de la informática, dibujo técnico y cálculo. También adquirió nuevos conocimientos en programación, manejo de software CAD, electrónica, circuitos eléctricos, diseño de PCB, control industrial, redes y comunicaciones industriales, robótica e instrumentación industrial, entre otros.
        
        Aunque tiene bases y fundamentos sólidos en cada una de las áreas antes mencionadas, su especialidad es la programación y el dibujo técnico en software CAD. En lo que respecta a la programación, el primer lenguaje que aprendió fue C y C++, con el cual programaba interfaces simples y sistemas embebidos durante los primeros semestres de la universidad. Más adelante, por exigencia de la institución y por interés propio, se adentró en el mundo del diseño web, estudiando el lenguaje de programación JavaScript para dar interactividad a las interfaces construidas mediante código HTML y CSS. En el transcurso de este proceso, adquirió dominio de términos como backend y frontend, interesándose en su aprendizaje en profundidad.
        
        En cuanto al backend, inició con el uso del lenguaje PHP para la construcción de diferentes algoritmos aplicando la estructura MVC. Luego, se interesó en el framework Laravel, con el cual realizó diversos ejercicios de aprendizaje para familiarizarse con su entorno. En cuanto al frontend, debido a sus conocimientos previos en JavaScript, Julián decidió adentrarse en el desarrollo en el entorno de trabajo denominado Angular, con el cual desempeñó muchos ejercicios de aprendizaje e inició con el diseño de interfaces más complejas, como el diseño para su curriculum vitae. En este proyecto, integró una API REST diseñada por él mismo en Laravel para interactuar con bases de datos MySQL, enviar correos e interactuar con diferentes APIs, como Cloud API para enviar mensajes de WhatsApp y la API de Open AI para la integración del chat GPT.
        
        Para su trabajo de grado, Burbano incorporó sus diferentes conocimientos para la construcción de un robot antropomórfico, diseñando su estructura en software SolidWorks. Debido a este trabajo y a proyectos de estudio, Julián Burbano obtuvo gran habilidad para el manejo de dicho programa. Asimismo, al proyecto incorporó algoritmos de visión artificial, añadiendo código basándose en modelos de Deep y Machine Learning con los cuales detectaba instrumentación quirúrgica para ser sujetada por el robot.
        
        El proyecto de Burbano logró la máxima nota posible, además de ser recomendado para tesis meritoria, para presentación en artículos científicos y para una mayor profundización en su campo.
        
        Julián Alejandro Burbano, mientras completaba sus estudios universitarios y ejecutaba su trabajo de grado, estudió y adquirió habilidades en cuanto al idioma inglés y tiene un nivel certificado de B1. Sin embargo, sus habilidades más destacadas son la lectura y escritura, dado que para su labor de investigación, la mayoría de temas de su interés se encuentran en dicho idioma, por lo que practica diariamente. Burbano se graduó como ingeniero en mecatrónica en la Universidad de Pamplona en el año 2023. Actualmente Julian tiene 25 años.

        Birography in English: Julián Alejandro Burbano Díaz was born in the city of Ipiales, Nariño, on August 26, 1997. At the age of five he entered the Sucre educational institution, where he studied until he was 17 years old. Since his childhood, he had great interest in computers and technology, as well as in areas such as mathematics, physics, chemistry, and sports such as soccer and athletics.
        
         At the end of his secondary education, he moved to the city of Pasto, where he studied with strict schedules at the Peña Academy. There he acquired skills in logical reasoning, algebra, and basic science.
        
         He entered the University of Pamplona, in the department of Norte de Santander, in 2017 for his training. He expanded his knowledge in the area of computer science, technical drawing and calculation. He also acquired new knowledge in programming, CAD software management, electronics, electrical circuits, PCB design, industrial control, industrial networks and communications, robotics and industrial instrumentation, among others.
        
         Although he has solid foundations and foundations in each of the aforementioned areas, his specialty is programming and technical drafting in CAD software. When it comes to programming, the first language he learned was C and C++, with which he programmed simple interfaces and embedded systems during the first semesters of university. Later, due to the institution's requirement and his own interest, he entered the world of web design, studying the JavaScript programming language to give interactivity to interfaces built using HTML and CSS code. In the course of this process, he acquired a command of terms like backend and frontend, becoming interested in learning them in depth.
        
         Regarding the backend, he started with the use of the PHP language for the construction of different algorithms applying the MVC structure. Later, he became interested in the Laravel framework, with which he performed various learning exercises to familiarize himself with his environment. Regarding the frontend, due to his previous knowledge of JavaScript, Julián decided to delve into development in the work environment called Angular, with which he carried out many learning exercises and began with the design of more complex interfaces, such as the design for his Curriculum vitae. In this project, he integrated a self-designed REST API in Laravel to interact with MySQL databases, send emails, and interact with different APIs, such as Cloud API for sending WhatsApp messages and Open AI API for GPT chat integration. .
        
         For his degree work, Burbano incorporated his different knowledge for the construction of an anthropomorphic robot, designing its structure in SolidWorks software. Due to this work and study projects, Julián Burbano obtained great ability to manage said program. Likewise, he incorporated artificial vision algorithms into the project, adding code based on Deep and Machine Learning models with which he detected surgical instruments to be held by the robot.
        
         Burbano's project achieved the highest possible score, in addition to being recommended for a meritorious thesis, for presentation in scientific articles and for further study in his field.
        
         Julián Alejandro Burbano, while completing his university studies and carrying out his degree work, studied and acquired English language skills and has a certified B1 level. However, his most outstanding skills are reading and writing, since for his research work, most of the topics of interest to him are in that language, so he practices daily. Burbano graduated as a mechatronics engineer from the University of Pamplona in 2023. Julian is currently 25 years old.
        
        PREGUNTA: ";

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
