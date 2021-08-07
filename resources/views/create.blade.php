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
        <form action="/ranks" method="POST">
            @csrf
            <div class="title">
                <h2>お題</h2>
                <input type="text" name="rank[title]" placeholder="例；好きなキャラ"/>
            </div>
            <div class="name">
                <h2>項目</h2>
                <textarea type="text" name="select[]" placeholder="例；マリオ"></textarea>
                <input type="button" value="＋" class="add pluralBtn">
                <input type="button" value="－" class="del pluralBtn">
            </div>
            <input type="submit" value="登録"/>
        </form>
 
    
        <div class='back'>[<a href='/'>戻る</a>]</div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).on("click", ".add", function() {
        $(this).parent().clone(true).insertAfter($(this).parent());
    });
    $(document).on("click", ".del", function() {
        var target = $(this).parent();
        if (target.parent().children().length > 1) {
            target.remove();
        }
    });
    </script>

</html>
