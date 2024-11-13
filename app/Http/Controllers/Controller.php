<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function showRegistrationForm()
    {
        dd('hello');
        return view('UserPenal.register');
    }
}
