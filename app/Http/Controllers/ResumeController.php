<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Illuminate\Support\Facades\DB;

class ResumeController extends Controller
{
    //

    public function index()
    {
        return view('resume.index');
    }

    public function store(Request $request)
    {
        $resume=$request->resume;
        $name=$request->name;
        $city=$request->city;
       
     

        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);
        $prompt="Write professional resume for" .$name. "He live in" .$city . "and he". $resume ;

        $openAiOutput = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 4000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        
        
        // var_dump($openAiOutput);
        $output=json_decode($openAiOutput,true);
        $outputText=$output['choices'][0]['text'];
       Resume::create([
       "res"=>$output['choices'][0]['text'],
       ]);
        
        return view('resume.index',compact('outputText'));

    }

  
}
