@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    詳細内容
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h5 class="card-title">印象に残った言葉</h5>
                    <p class="card-text">
                    {{ $word->text }}</p>
                    <h5 class="card-title">どの様な印象を持ったか</h5>
                    <p class="card-text">
                    {{ $word->impression }}</p>
                    <h5 class="card-title">具体的にどの様な行動をするのか</h5>
                    <p class="card-text">
                    {{ $word->action }}</p>
                    <form method="GET" action="{{ route('words.edit', ['id' => $word->id]) }}">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="編集する">              
                    </form>
                    <br>
                    <a href="#">いいねする（実装中）</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
