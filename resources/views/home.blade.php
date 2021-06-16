@extends('template.layout')

@section('content')  
@foreach ($berita as $b)
<div class="card" style="width: 70%;">
  <img class="card-img-top" src="{{$b->picture}}" alt="Card image cap" style="height: 300px;">
  <div class="card-body">
    <h5 class="card-title">{{$b->title}}</h5>
    <p class="card-text">{{$b->content}}.</p>
  </div>
</div>
@endforeach                
@endsection