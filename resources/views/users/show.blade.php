@extends('layouts.app')
{{ $user->name }}さんのマイページ

@foreach($words as $word)
    記事
    {{ $word->text }}<br>
    印象
    {{ $word->impression }}<br>
    行動
    {{ $word->action }}<br>
@endforeach