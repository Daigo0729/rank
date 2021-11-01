<!DOCTYPE html>
@extends('layouts.app')

@section('content')
         
        <h1>ランキング投票</h1>
        <form action="/serch/ranks_index" method="GET">
            @csrf
            <div class="serch">
                <input type="text" name="rank[title]" size="100" placeholder="キーワードを入力してください"/>
                <input type="submit" value="検索"/>
                <span class='create'>[<a href='/ranks/create'>投稿する</a>]</span>
                <span class='vote'>[<a href='/ranks/vote'>投票する</a>]</span>
            </div>
            
        </form>
        <span class='create'>[<a href='/'>新しい順</a>]</span>
        <span class='create'>[<a href='/count'>投票数順</a>]</span>
        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
        <div class="card-header">一覧</div>
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

        <div class='ranks'>
            @foreach($ranks as $rank)
                <div class='rank'>
                    <a href='/ranks/{{$rank->id}}'><h2 class="text-center">{{ $rank -> title}}</h2></a>
                    <p class="text-center">総票数:{{ $rank -> count}}票</p>
                </div>
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
        </div>
    
@endsection
