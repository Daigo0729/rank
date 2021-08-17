<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        
        <h1 class='title'>{{ $rank -> title}}</h1>
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
                </div>
            @endforeach
        </div>  
            
            
        </div>
        <div class='back'>[<a href='/'>戻る</a>]</div>
@endsection