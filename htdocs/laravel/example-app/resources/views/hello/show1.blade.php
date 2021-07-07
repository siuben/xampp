@extends('layouts.app')

@section('content')
<h1>Order for {{$food->name}}</h1>
<h5>{{$food->food}}</h1>
<h5>{{$food->jobs}}</h1>
<div>
@foreach($food->toppings as $topping)
<li>{{$topping}}</li>
@endforeach
</div>
<form action="{{route('hello.destroy1', $food->id)}}" method="POST">
@csrf
@method('DELETE')  <!-- @method('DELETE') Cannot need is ok -->
<button>Cancelled</button>
</form>

@endsection
