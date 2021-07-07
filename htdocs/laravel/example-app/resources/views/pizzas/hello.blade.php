@extends('layouts.hellolayout')
@section('content')
<div class="helloform formcolor">
<h1>Create food menus</h1></div>
<form action="{{ route('pizzas.save') }}" method="POST">
@csrf
<label for="food">Food</label>
<select name="food" id="food">
<option value="apple">apple</option>
<option value="pizza">pizza</option>
<option value="vegetables">vegetables</option>
</select>
<label for="name">name</label>
<input type="name" id="name" name="name">
<label for="jobs">Jobs</label>
<select name="jobs" id="jobs">
    <option value="programmer">programme</option>
    <option value="doctor">doctor</option>
    <option value="lawer">lawer</option>
</select>
<fieldset>
    <label for="Extra topppings">Extra topppings</label>
    <input type="checkbox" name="toppings[]" value="abc">abc
    <br>
    <input type="checkbox" name="toppings[]" value="bcd">bcd
    <br>
    <input type="checkbox" name="toppings[]" value="cde">cde
</fieldset>
<input type="submit" value="order">
</form>
@endsection('content')