<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostalCodeController extends Controller
{
    public function search(Request $request) {
        return \App\Models\PostalCode::whereSearch(
            $request->first_code, 
            $request->last_code
        )->first();
    }
}
