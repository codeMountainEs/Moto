<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class MotoController extends Controller
{

    public function index(): View
    {
       // return response('Hello World');
        return view('motos');
    }
}
