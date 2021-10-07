<!DOCTYPE html>
@extends('layouts.app')

@section('content')

        <div class="container">
        <h1>ランキング投票</h1>
        </div>
        <form action="/serch/ranks" method="GET">
            @csrf
            <div class="serch">
                <input type="text" name="rank[title]" placeholder="キーワードを入力してください"/>
            </div>
            <input type="submit" value="検索"/>
        </form>
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
    
@endsection
