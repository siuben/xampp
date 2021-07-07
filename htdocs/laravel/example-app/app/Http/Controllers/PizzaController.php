<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;
use App\food;

class PizzaController extends Controller
{

  // public function __construct(){
  //   $this->middleware('auth');
  // }

  public function index() {

    $pizzas = Pizza::latest()->get();      

    return view('pizzas.index', [
      'pizzas' => $pizzas,
    ]);
  }

  public function show($id) {
    
    $pizza = Pizza::findOrFail($id);

    return view('pizzas.show', ['pizza' => $pizza]);
  }

  public function create() {
    return view('pizzas.create');
  }

  public function store() {

    $pizza = new Pizza();

    $pizza->name = request('name');
    $pizza->type = request('type');
    $pizza->base = request('base');
    $pizza->toppings = request('toppings');

    $pizza->save();

    return redirect('/')->with('mssg', 'Thanks for your order!');

  }

  public function destroy($id) {

    $pizza = Pizza::findOrFail($id);
    $pizza->delete();

    return redirect('/pizzas');

  }

  public function hello() {
    return view('pizzas.hello');
}

public function create1() {
  return view('pizzas.create1');
}

public function save() {

  $food = new food();

  $food->food = request('food');
  $food->name = request('name');
  $food->jobs = request('jobs');
  $food->toppings = request('toppings');

  $food->save();

  return redirect('/')->with('mssg', 'Thanks for your order!');

}

public function index1() {
  $food = food::latest()->get();
  return view('hello.index1', ['food' => $food,]);
}

public function show1($id) {
  $food=food::findorFail($id);
  return view('hello.show1', ['food' => $food,]);
}

public function destroy1($id) {

  $food = food::findOrFail($id);
  $food->delete();

  return redirect('/hello');

}

}