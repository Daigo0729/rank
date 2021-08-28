<!DOCTYPE html>
@extends('layouts.app')

@section('content')

        
        <h1>らんきんぐ投票</h1>
        <div class='ranks'>
            @foreach($ranks as $rank)
                <div class='rank'>
                    <a href='/ranks/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                </div>
            @endforeach
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
    
@endsection
