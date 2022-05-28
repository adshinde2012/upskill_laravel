<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->isMethod('GET')) {
            return view('pages-login');
        }
        if ($request->isMethod('POST')) {
            // return view('pages-login');
        }
        
    }
}
