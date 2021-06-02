<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    public function postal_code() {
        return view('postal_code');
    }
}
