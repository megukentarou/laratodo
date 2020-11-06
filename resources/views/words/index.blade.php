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
                <div class="card-header">投稿一覧</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('words.create') }}">
                    <button type="submit" class="btn btn-outline-primary btn-lg">
                      新規投稿する
                    </button>            
                    </form>
                    <br>

                    キーワードで検索
                    <form method="GET" action="{{ route('words.index') }}" class="form-inline">
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="入力して下さい" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
                    </form>
                    <br>

                    <a  class="btn btn-light bg-light border-dark" href="{{ route('words.index') }}">全件表示する</a>
                    <br>

                    @foreach($words as $word)
                    <div class="container">
                        <div class="card mt-3">
                        <div class="card-body d-flex flex-row">
                            <i class="fas fa-user-circle fa-3x mr-1"></i>
                            <div class="font-weight-bold">
                                ユーザー名(実装中)
                            </div>
                        </div>
                        <div class="card-body pt-0 pb-2">
                            <h3 class="h4 card-title">
                            {{ $word->text}}
                            </h3>
                            <div class="card-text">
                            記事本文
                            </div>
                            <a href="{{ route('words.show', ['id' => $word->id]) }}" class="btn btn-light" >詳細を見る</a>
                        </div>
                        </div>
                    </div>
                    @endforeach 
                    <br>
                    {{ $words->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
