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
                            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
        <div class="card-header">{{ $select -> name}}</div>
        <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                            
                            <img src="{{ $select->image_path }}">
                        </div>
                        <input type="submit" value="投票"/>
                        </div>
                </div>
            </div>
        </div>
    </div>
                    </form>
                @endforeach
            </div>
        </div>
        <div class='back'>[<a href='/'>home</a>]</div>
@endsection

