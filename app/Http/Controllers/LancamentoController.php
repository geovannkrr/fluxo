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
    public function index(Request $request, $search=null)
    {
    $search = $request->get('search');
    $dt_inicial = $request->get('dt_inicial')??null;
    $dt_final = $request->get('dt_final')??null;
    //where('id_user',Auth::user()->id)
        $lancamentos = Lancamento::where(function($query) use($search,$dt_inicial,$dt_final) {

            if($search){
                $query->where('descricao','like',"%$search%");

            }
            if($dt_inicial){
                $query->where('vencimento','>=',$dt_inicial);

            }
            if($dt_final){
                $query->where('vencimento','<=',$dt_final);

            }

        })->orderBy('id_lancamento','desc')->paginate(10);
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
        $lancamento = new Lancamento();
        $lancamento->fill($request->all());
        $lancamento->id_user = Auth::user()->id;
        //subir o anexo
        if($request->anexo){
            $extension= $request->anexo->getClientOriginalExtension();
            $nomeAnexo = date('YmdHis').'.'.$extension;
            $request->anexo->storeAs('anexos',$nomeAnexo);
               // $lancamento->anexo = $request->anexo->store('anexos');
        }
        $lancamento->save();
        return redirect()->route('lancamento.index');
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
