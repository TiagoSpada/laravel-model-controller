<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Movie </title>
    @vite('resources/js/app.js')
</head>
<body>
    
    <h1 class="text-primary my-4">Movies</h1>
    {{-- @dd($movies) --}}
    <div class="container">
        <ul class="list-group">
            @foreach ($movies as $movie)
                <li class="list-group-item">{{$movie['title']}}</li>
            @endforeach
        </ul>
    </div>


    
</body>
</html>