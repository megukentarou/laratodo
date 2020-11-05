@extends('layouts.app')
@if (Session::has('flash_message'))
    <p class="bg-success">{!! Session::get('flash_message') !!}</p>
@endif

@if (Session::has('error_message'))
    <p class="bg-danger">{!! Session::get('error_message') !!}</p>
@endif
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('words.create') }}">
                    <button type="submit" class="btn btn-primary">
                      新規投稿する
                    </button>            
                    </form>

                    <form method="GET" action="{{ route('words.index') }}" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="入力して下さい" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>

                    <table class="table">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">テキスト</th>
                        <th scope="col">感想</th>
                        <th scope="col">行動</th>
                        <th scope="col">詳細</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($words as $word)
                    <tr>
                    <th scope="row">{{ $word->id}}</th>
                    <td>{{ $word->text}}</td>
                    <td>{{ $word->impression}}</td>
                    <td>{{ $word->action}}</td>
                    <td><a href="{{ route('words.show', ['id' => $word->id]) }}" class="btn btn-light" >詳細を見る</a></td>
                    @endforeach  
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
