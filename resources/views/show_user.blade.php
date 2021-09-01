<!DOCTYPE html>
@extends('layouts.app')

@section('content')
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
            <div class='selects'>
            @foreach($selects as $select)
                <div class='select'>
                    <h2 class='name'>{{ $select -> name}}</h2>
                    <h2 class='users_count'>{{ $select -> users_count}}票</h2>
                    <img src="{{ $select->image_path }}">
                </div>
            @endforeach
        </div>  
        <div class='back'>[<a href='/'>home</a>]</div>
@endsection
        <script>
            function deleteRank(e) {
                'use strict';
                if(confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById('form_delete').submit();
                }
            }
        </script>

