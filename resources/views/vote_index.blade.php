<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <h1>投票受付中</h1>
        <div class='ranks'>
            @foreach($ranks as $rank)
                @if($rank['destroy']===0)
                    <div class='rank'>
                        <a href='/ranks/vote/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                    </div>
                @endif
            @endforeach
        </div>
        <div class='paginate'>
            {{$ranks->links()}}
        </div>
        <div class='back'>[<a href='/'>戻る</a>]</div>
    </body>
@endsection
