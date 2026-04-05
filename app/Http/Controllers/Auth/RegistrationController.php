<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{

    public function index()
    {
        return view('pages.forms.register');
    }

    public function store(RegistrationRequest $request)
    {
        $data = $request->validated();

        $data['password'] = Hash::make($data['password']);

        $users = User::create($data);

        return redirect()->route('dashboard',compact('users'));
    }

}
