<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        return view('profile', compact('usuario'));
    }
}