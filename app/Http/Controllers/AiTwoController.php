<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;

class AiTwoController extends Controller
{
    //
    public function index()
    {
        return view('aitwo.index');
    }

    public function generateimage(Request $request)
    {
        $aiimage=$request->aiimage;
        $aisize=$request->aisize;
        

        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);

         $prompt=$aiimage;
         $aisize=$aisize;

        $openAiOutput = $open_ai->Image([
           
            'prompt' => $prompt,
            "n" => 1,
            "size" => $aisize,
             "response_format" => "url",
         
        ]);
        
         $output=json_decode($openAiOutput,true);
        $outputText=$output['data'][0]['url'];
        //  var_dump($openAiOutput);
        return view('aitwo.index',compact('outputText'));
    }
}
