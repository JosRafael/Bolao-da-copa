<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email ou senha incorretos.',
        ]);
    }

    function cadastrar(Request $request) {
        // verificar se já existe o email
        $usuario = User::whereEmail($request->email)->first();
        if ($usuario)
            return back()->withErrors(["cadastro"=>"Email já cadastrado!"]);

        // verificar se senhas combinam
        if ($request->password !== $request->confirma_password)
             return back()->withErrors(["cadastro"=>"As senhas não combinam!"]);

        $usuario = new User();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->save();

        return back()->with("cadastro", "Cadastro realizado com sucesso, por favor, faça login.");
    }

    function logout() {
        Auth::logout();
        return redirect()->route('welcome');
    }
}
