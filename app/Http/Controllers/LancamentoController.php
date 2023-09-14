<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{
    CentroCusto,
    Lancamento,
    Tipo,
    User
};

/**listar todos os lancamentos */

class LancamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lancamentos = Lancamento::orderBy('vencimento')->paginate(10);
        return view('lancamento.index')->with(compact('lancamentos'));
    }

    /**
     * direciona para o form de lancamento
     * @date-11-09-2023
     */
    public function create()
    {
        $lancamento = null;
        $centrosdecusto = CentroCusto::class;
        $tipos=Tipo::class;
        return view('lancamento.form')->with(compact('lancamento','centrosdecusto','tipos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Lancamento $lancamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lancamento $lancamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lancamento $lancamento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lancamento $lancamento)
    {
        //
    }
}
