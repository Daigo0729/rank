@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">☆あなたの投稿</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                <div class='ranks'>
                @foreach($ranks as $rank)
                        <div class='rank'>
                            <a href='/rank_user/{{$rank->id}}'><h2 class='name'>{{ $rank -> title}}</h2></a>
                        </div>
                @endforeach
            </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
