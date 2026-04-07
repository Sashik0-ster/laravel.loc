<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function showRegistrationForm()
    {
        return view('pages.forms.register');
    }

    public function registration(RegistrationRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->intended('login')->withErrors('status', 'Реєстрація успішна.');
    }

}
