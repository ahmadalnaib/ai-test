<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <title>Generateimage</title>
</head>
<body>
  <div class="container mt-5">
    <form action="{{route('resume.store')}}" method="post">
      @csrf
      <div class="mb-3">
       
        <input name="resume" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write Web Developer, ">
      
        <div id="emailHelp" class="form-text">We'll fuck the AI.</div>
      </div>

      <button type="submit" class="btn btn-danger">generate Resume</button>
    </form>
  </div>
  <div class="container mt-5">
    @isset($outputText)
       {{-- <p style="white-space: pre-line">{{$outputText}}</p> --}}
       <textarea class="form-control"  id="" cols="30" rows="10">
        {{$outputText}}
       </textarea>
    @endisset 
    <a class="btn btn-primary mt-5" href="{{ URL::to('/ai-resume/pdf') }}">Export to PDF</a>
  </div>
</body>
</html>