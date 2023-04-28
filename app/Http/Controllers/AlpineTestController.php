<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AlpineTestController extends Controller
{
    public function index()
    {
        return view('alpine-test.index');
    }
}
