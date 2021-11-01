<!DOCTYPE html>
@extends('layouts.app')

@section('content')

        
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
        <div class="card-header">検索一覧</div>
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
        <div class='ranks'>
            @foreach($ranks as $rank)
                <div class='rank'>
                    <a href='/ranks/{{$rank->id}}'><h2 class='title'>{{ $rank -> title}}</h2></a>
                </div>
            @endforeach
        </div>
        </div>
                </div>
            </div>
        </div>
    </div>
        <div class='back'>[<a href='/'>home</a>]</div>
    
@endsection
