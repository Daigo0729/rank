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
        <h1>ランキング10</h1>
        <p class='create'>[<a href='/ranks/create'>投稿する</a>]</p>
        <p class='vote'>[<a href='/ranks/vote'>投票する</a>]</p>
        <div class='ranks'>
            @foreach($ranks as $rank)
                <div class='rank'>
                    <a href='/ranks/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{$ranks->links()}}
        </div>
    </body>
</html>
