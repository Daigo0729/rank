<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        
        <h1 class='title'>{{ $rank -> title}}</h1>
        <a href='/ranks/user/{{$user->id}}'><p class='count'>投稿者:{{ $user->name}}</p></a>
        <a href='/ranks/comment/{{$rank->id}}'><p>コメントを書く</p></a>
        <a href='/ranks/comment/read/{{$rank->id}}'><p>コメントを見る</p></a>
        <p class='count'>総票数:{{ $rank -> count}}票</p>
        @if($rank['destroy']===1)
            <p>投票期間は終了しています</p>
        @else
            <a href='/ranks/vote/{{$rank->id}}'><p>投票期間中</p></a>
        @endif
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
            
            
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
@endsection