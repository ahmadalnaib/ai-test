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
     

        $open_ai_key = getenv('OPENAI_API_KEY');
        $open_ai = new OpenAi($open_ai_key);
        $prompt="Write resume for" . $resume ;

        $openAiOutput = $open_ai->completion([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.9,
            'max_tokens' => 4000,
            'frequency_penalty' => 0,
            'presence_penalty' => 0.6,
        ]);
        
        
        $output=json_decode($openAiOutput,true);
        $outputText=$output['choices'][0]['text'];
        //   var_dump($openAiOutput);
       Resume::create([
       "res"=>$output['choices'][0]['text'],
       ]);
        
        return view('resume.index',compact('outputText'));

    }

  
    public function createPDF() {
        // retreive all records from db
        $data = Resume::latest()->first();
        
        // share data to view
        view()->share('resume.show',$data);
        $pdf = PDF::loadView('resume.show',compact('data'));
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
}
