@extends('layouts.app')
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

                   <br>
                   ・印象に残った言葉
                   <br>
                    {{ $word->text }}
                    <br>
                    ・どの様な印象を持ったか
                    <br>
                    {{ $word->impression }}
                    <br>
                    ・具体的にどの様な行動をするのか
                    <br>
                    {{ $word->action }}
                    <br>
                    <form method="GET" action="{{ route('words.edit', ['id' => $word->id]) }}">
                    @csrf
                    <input class="btn btn-primary" type="submit" value="編集する">              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
