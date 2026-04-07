<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LogOutController extends Controller
{

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->intended("login");
    }

}
