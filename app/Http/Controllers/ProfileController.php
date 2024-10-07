<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show(): View
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

}
