<?php

namespace App\Http\Controllers;

use App\Specie;
use Illuminate\Http\Request;
use App\Person;

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
        $people = Person::with('planet')
                        ->paginate();

        return view('home', compact(['people']));
    }
}
