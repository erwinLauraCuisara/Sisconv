<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\convocatoria;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convocatorias=convocatoria::paginate(5);
        return view('index')->with(compact('convocatorias'));
    }
}
