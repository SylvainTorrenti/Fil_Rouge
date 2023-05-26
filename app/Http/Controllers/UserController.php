<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('infos');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|min:10'
        ]);
        return 'Le nom saisi est ' . $request->input('nom');
    }
    public function aChanger()
    {
        return view('logUser');
    }
    public function password()
    {
        return view('mdpoubli');
    }
    public function passwordForgot(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|min:10|email:rfc,dns'
        ]);
        return view('acceuil');
    }
    public function createAccount()
    {
        return view('fil_rouge/auth/register');
    }
    public function storeAccount(Request $request)
    {
        $this->validate($request, [
            'login' => 'required',
            'pwd' => 'required',
            'rpwd' => 'required',
            'Email' => 'required',
            'Nom' => 'required',
            'Prenom' => 'required',
            'Telephone' => 'required'
        ]);
        return view('logUser');
    }
}
