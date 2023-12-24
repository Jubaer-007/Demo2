<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function index()
    {
        return view("fontend.master");
    }
}
