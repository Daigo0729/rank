<!DOCTYPE html>
@extends('layouts.app')

@section('content')

        
        <h1>{{ $user -> name}}さんの投稿</h1>
        <div class='ranks'>
            @foreach($ranks as $rank)
                <div class='rank'>
                    <a href='/ranks/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                    <p class='count'>総票数:{{ $rank -> count}}票</p>
                </div>
            @endforeach
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
        
    
@endsection
