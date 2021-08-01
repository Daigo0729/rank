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
        <h1>Blog Name</h1>
        <div class='rank'>
            <h2 class='title'>{{ $rank -> title}}</h2>
            <p class='body'>{{ $rank ->body}}</p>
            <p class='updated_at'>{{ $rank ->updated_at}}</p>
        </div>
        <div class='back'>[<a href='/'>back</a>]</a></div>
    </body>
</html>
