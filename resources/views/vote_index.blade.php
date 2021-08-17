<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Blog</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        
    </head>
    <body>
        <h1>投票受付中</h1>
        <div class='ranks'>
            @foreach($ranks as $rank)
                @if($rank['destroy']===0)
                    <div class='rank'>
                        <a href='/ranks/vote/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class='paginate'>
            {{$ranks->links()}}
        </div>
    </body>
</html>
