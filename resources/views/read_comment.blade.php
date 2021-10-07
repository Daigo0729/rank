<!DOCTYPE html>
@extends('layouts.app')

@section('content')

　　　　<h1>コメント</h1>
        <div class='comments'>
            @foreach($comments as $comment)
                <div class='comment'>
                    <p class='body'>{{ $comment -> body}}</p>
                    @foreach($users as $user)
                        <div class='user'>
                            @if($user['id']===$comment['user_id'])
                                <p class='name'>投稿者:{{ $user -> name}}</p>
                            @endif
                        </div>
                    @endforeach
                    <p class='created_at'>更新日:{{ $comment -> created_at}}</p>
                    <p class='line'>{{ $line }}</p>
                </div>
            @endforeach
        </div>
        
        <div class='back'>[<a href='/'>home</a>]</div>
        
    
@endsection
