<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <form action="/serch/ranks_vote" method="GET">
            @csrf
            <div class="serch">
                <input type="text" name="rank[title]" size="100" placeholder="キーワードを入力してください"/>
                <input type="submit" value="検索"/>
            </div>
        </form>
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
        <div class="card-header">投票受付中</div>
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class='ranks'>
            @foreach($ranks as $rank)
                @if($rank['destroy']===0)
                    <div class='rank'>
                        <a href='/ranks/vote/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                    </div>
                @endif
            @endforeach
        </div>
        </div>
                </div>
            </div>
        </div>
    </div>
        <div class='paginate'>
            {{$ranks->links()}}
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
    </body>
@endsection
