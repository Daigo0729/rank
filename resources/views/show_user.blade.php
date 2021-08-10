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
        <h1 class='title'>{{ $rank -> title}}</h1>
        <p class="edit">[<a href="/ranks/{{$rank->id}}/edit">投票を終了する</a>]</p>
        <form action="/ranks/{{ $rank->id}}" id="form_delete" method="POST">
            {{ csrf_field()}}
            {{ method_field('delete')}}
            <input type="submit" style="display:none">
            <p class='delete'>[<span onclick="return deleteRank(this);">削除</span>]</p>
        </form>
        <div class='rank'>
            <p class='updated_at'>{{ $rank ->updated_at}}</p>
        </div>
        <div class='back'>[<a href='/'>back</a>]</div>
        <script>
            function deleteRank(e) {
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>
    </body>
</html>
