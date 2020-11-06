@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">新規投稿ページ</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="POST" action="{{route('words.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">
                        ・印象に残った言葉を入力して下さい
                        </label>
                        <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="5" placeholder="入力例：人生に失敗がないと、人生を失敗する。＠斎藤茂太" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">
                        ・その言葉にどの様な印象を持ちましたか？
                        </label>
                        <textarea class="form-control" name="impression" id="exampleFormControlTextarea2" rows="5" placeholder="入力例：人生はチャレンジしない事こそが１番の失敗なんだと感じた" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea３">
                        ・具体的にどの様な行動をしますか？
                        <br>
                        (出来るだけ細かく決める事で具体性が生まれてきて、行動しているイメージがしやすくなります。)
                        </label>
                        <textarea class="form-control" name="action" id="exampleFormControlTextarea３" rows="7" placeholder="入力例：WHAT：毎朝５時起きして資格の勉強する。WHEN：まずは３週間続けてみる。WHY：このままだといつまで経っても新しい事にチャレンジ出来ないから。HOW:10時までには必ず寝る。ご飯は8時までに食べ終わる。寝る前にコーヒーを飲まない。" ></textarea>
                    </div>
                    <input type="submit" class="btn btn-info btn-lg" value="投稿する">
                         
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
