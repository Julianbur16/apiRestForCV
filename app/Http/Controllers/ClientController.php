<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contacMail;
use App\Mail\messageMail;
use Illuminate\Support\Facades\Http;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients=client::all();
        //return $clients to json response
        return response()->json($clients);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $clients=new client();
        $clients->name=$request->name;
        $clients->email=$request->email;
        $clients->phone=$request->phone;
        $clients->message=$request->message;
        $clients->save();

        $datos=$request;
        $data=[
            "message"=>"client created successfully",
            "client"=>"$clients"
        ];

        foreach([$request->email] as $recipient ){
            Mail::to($recipient)->send(new contacMail($datos));    
        }
        
        foreach(['julianbur16@gmail.com'] as $recipient ){
            Mail::to($recipient)->send(new messageMail($datos));    
        }

        $phone_id='107075959013398';
        $version='v16.0';
        $token=env('TOKEN');
        

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://graph.facebook.com/v16.0/108950852159753/messages',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "messaging_product": "whatsapp",
            "to": '.$request->phone.',
            "type": "text",
            "text": { 
            "preview_url": false,
            "body": "Este mensaje esta personalizado"
        }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://graph.facebook.com/v16.0/108950852159753/messages',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "messaging_product": "whatsapp",
            "to": "573157683957",
            "type": "text",
            "text": { 
            "preview_url": false,
            "body": "Este mensaje esta personalizado"
        }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer '.$token
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);

        return response()->json($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(client $client)
    {
        $clients=client::find($client);
        if($clients != null){
            return response()->json($clients);
        }else{
            $data=["message"=>"cliente no existe"];
            return response()->json($data);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(client $client)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, client $client)
    {
        $client->name=$request->name;
        $client->email=$request->email;
        $client->phone=$request->phone;
        $client->addres=$request->addres;
        $client->save();
        $data=[
            "message"=>"client update successfully",
            "client"=>"$client"
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(client $client)
    {
        $clients=client::find($client->id);
        $clients->delete();
        $data=["message"=>"client delete successfully"];
        return response()->json($data);
    }
}
