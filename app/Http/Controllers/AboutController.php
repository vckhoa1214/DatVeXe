<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function showAbout()
    {
        return view('user.about'); // Trả về view about.blade.php
    }
}
