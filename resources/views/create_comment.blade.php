<!DOCTYPE html>
@extends('layouts.app')

@section('content')
        <h1>コメントを書く</h1>
        <form action="/comments/{{$rank ->id}}" method="POST">
            @csrf
            <div class="title">
                <input type="name" name="comment[body]" placeholder="１文字以上で"/>
            </div>
            <input type="submit" value="登録"/>
        </form>
 
    
        <div class='back'>[<a href='/'>home</a>]</div>
    

@endsection
