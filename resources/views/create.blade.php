<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <h1>ランキング投票</h1>
        <form action="/ranks" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>お題</h2>
                <input type="text" name="rank[title]" placeholder="例；好きなキャラ"/>
            </div>
            <div class="name">
                <h2>項目</h2>
                <p>※画像は.jpgで登録してください</p>
                <textarea type="text" name="select[]" placeholder="例；マリオ"></textarea>
                <input type="file" name="image[]">
                <input type="button" value="＋" class="add pluralBtn">
                <input type="button" value="－" class="del pluralBtn">
            </div>
            <input type="submit" value="登録"/>
        </form>
 
    
        <div class='back'>[<a href='/'>home</a>]</div>
    
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

@endsection
