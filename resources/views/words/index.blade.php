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
                    <br>
                    index.bladeです
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
