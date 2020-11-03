wordモデルのindex
<br>
@foreach($values as $value)
{{$value->text}}<br>
{{$value->impression}}<br>
{{$value->action}}<br>
@endforeach