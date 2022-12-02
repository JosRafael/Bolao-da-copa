<?php

namespace App\Http\Controllers;

use App\Models\Aposta;
use Illuminate\Http\Request;
use App\Models\Jogo;

class ApostaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jogos = Jogo::all();
        return view('apostas', ["jogos"=>$jogos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Aposta  $aposta
     * @return \Illuminate\Http\Response
     */
    public function show(Aposta $aposta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Aposta  $aposta
     * @return \Illuminate\Http\Response
     */
    public function edit(Aposta $aposta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Aposta  $aposta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aposta $aposta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Aposta  $aposta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Aposta $aposta)
    {
        //
    }
}
