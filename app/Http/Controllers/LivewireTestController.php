<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LivewireTestController extends Controller
{
    public function index()
    {
       return view('livewire-test.index') ;
    }

    public function register()
    {
        return view('livewire-test.register');
    }
}
