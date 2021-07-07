<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
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
}
