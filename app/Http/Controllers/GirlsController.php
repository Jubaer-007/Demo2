<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GirlsController extends Controller
{
    public function girls()
{
    return view('admin.girls');
}
}
