<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function register()
    {
        return view('register');
    }

public function welcome(Request $request)
{
    $firstName = Str::title($request->input('first_name'));
    $lastName = Str::title($request->input('last_name'));

    return view('welcome', compact('firstName', 'lastName'));
}

}