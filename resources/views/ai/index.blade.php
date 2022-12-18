<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <title>Ai-</title>
</head>
<body>
  <div class="container mt-5">
    <form action="{{route('ai.result')}}" method="post">
      @csrf
      <div class="mb-3">
       
        <input name="topic" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Write to AI">
        <div id="emailHelp" class="form-text">We'll fuck the AI.</div>
      </div>

      <button type="submit" class="btn btn-primary">TALK</button>
    </form>
  </div>
  <div class="container">
    @isset($outputText)
        <h3 style="white-space: pre-line">{{$outputText}}</h3>
    @endisset 

  </div>
</body>
</html>