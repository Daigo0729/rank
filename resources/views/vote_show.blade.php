<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <h1>投票受付中</h1>
        <div class='rank'>
            <h2 class='title'>{{ $rank -> title}}</h2>
            <p class='updated_at'>{{ $rank ->updated_at}}</p>
            <div class='selects'>
                @foreach($selects as $select)
                    <form action="/ranks/vote/{{ $rank -> id}}/{{$select -> id}}" method="POST">         
                        @csrf
                        <div class='rank'>
                            <h2 class='name'>{{ $select -> name}}</h2>
                            <img src="{{ $select->image_path }}">
                        </div>
                        <input type="submit" value="投票"/>
                    </form>
                @endforeach
            </div>
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
@endsection

