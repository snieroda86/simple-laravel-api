<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Services\Calculator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('calc');
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

    public function calc(Calculator $calc)
    {
        // return $calc->add(2, 3);

        $cos = app()->make(Calculator::class);

        dd($cos);
    }
}
