<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControlController extends Controller
{
    public function index()
    {
        return view('control.index');
    }
}
