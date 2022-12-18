<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;


class AiController extends Controller
{
    //
    public function index()
    {
        return view('ai.index');
    }

    public function result(Request $request)
    {
        $topic=$request->topic;

        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);
        $prompt="Create 5 fake news about ".$topic. "\n";

        $openAiOutput = $open_ai->completion([
            'model' => 'text-davinci-001',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 150,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        
        $output=json_decode($openAiOutput,true);
        $outputText=$output['choices'][0]['text'];
        // var_dump($openAiOutput);

        return view('ai.index',compact('outputText'));
    }
}
