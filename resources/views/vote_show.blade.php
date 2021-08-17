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
        <div class='rank'>
            <h2 class='title'>{{ $rank -> title}}</h2>
            <p class='updated_at'>{{ $rank ->updated_at}}</p>
            <div class='selects'>
                @foreach($selects as $select)
                    <form action="/ranks/vote/{{ $rank -> id}}/{{$select -> id}}" method="POST">         
                        @csrf
                        <div class='rank'>
                            <h2 class='name'>{{ $select -> name}}</h2>
                        </div>
                        <input type="submit" value="投票"/>
                    </form>
                @endforeach
            </div>
        </div>
        <div class='back'>[<a href='/'>back</a>]</div>
    </body>
</html>
