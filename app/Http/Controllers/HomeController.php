<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jogo;

class HomeController extends Controller
{
    function index() {
        //listar jogos.
        $jogos = Jogo::limit(6)->get();
        return view('welcome', ["jogos"=>$jogos]);
    }
}
