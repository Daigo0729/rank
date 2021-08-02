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
        <h1>投票中</h1>
        <div class="content">
            <form action="/ranks/{{ $rank->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="title">
                    <h2>Title</h2>
                    <input type="text" name="rank[title]" placeholder="タイトル" value="{{$rank->title}}"/>
                </div>
                <div class="body">
                    <h2>Body</h2>
                    <textarea type="text" name="rank[body]" placeholder="今日も一日お疲れさまでした">{{$rank->body}}</textarea>
                </div>
                <input type="submit" value="update"/>
            </form>
        </div>
        <div class='back'>[<a href='/ranks/{{ $rank->id}}'>back</a>]</div>
    </body>
</html>
