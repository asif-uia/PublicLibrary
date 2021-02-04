<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library;

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
     * SRedirect to the library
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Library::all();
        return view('libraries/index', compact('books'));
    }
}
