@extends('layouts.app')

@section('content')
<div class="wrapper pizza-index">
  <h1>food Orders</h1>
  @foreach ($food as $food)
  <h4><a href="{{route('hello.show1', $food->id)}}">{{$food->name}}</h4>
  @endforeach
</div>
<h4><a href="{{route('pizzas.hello')}}">Create Order > route('pizzas.hello')</h4>
@endsection
