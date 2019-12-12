<?php

namespace App\Http\Controllers;

use App\UnidadeSaude;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnidadeSaudeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades_saude = UnidadeSaude::all();

        return view('unidades_saude.index', compact('unidades_saude'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function create()
    {
        if (Auth::check()) {
            $horarios_funcionamento = UnidadeSaude::$horarios_funcionamento;
            $naturezas_juridicas = UnidadeSaude::$naturezas_juridicas;
            return view('unidades_saude.create', compact('horarios_funcionamento', 'naturezas_juridicas'));
        } else {
            return $this->noAuth();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo_cnes' => 'required',
            'nome' => 'required',
            'endereco' => 'required',
            'diretor_clinico' => 'required',
            'horario_funcionamento' => 'required',
            'natureza_juridica' => 'required',
        ]);

        UnidadeSaude::create($request->all());

        return redirect()->route('unidades_saude.index')
            ->with('success','Unidade de saúde criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UnidadeSaude  $unidadeSaude
     * @return \Illuminate\Http\Response
     */
    public function show(UnidadeSaude $unidadeSaude)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UnidadeSaude  $unidade_saude
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function edit(UnidadeSaude $unidade_saude)
    {
        if (Auth::check()) {
            $horarios_funcionamento = UnidadeSaude::$horarios_funcionamento;
            $naturezas_juridicas = UnidadeSaude::$naturezas_juridicas;
            return view('unidades_saude.edit', compact('unidade_saude', 'horarios_funcionamento', 'naturezas_juridicas'));
        } else {
            return $this->noAuth();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UnidadeSaude  $unidade_saude
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function update(Request $request, UnidadeSaude $unidade_saude)
    {
        $request->validate([
            'codigo_cnes' => 'required',
            'nome' => 'required',
            'endereco' => 'required',
            'diretor_clinico' => 'required',
            'horario_funcionamento' => 'required',
            'natureza_juridica' => 'required',
        ]);

        $unidade_saude->update($request->all());

        return redirect()->route('unidades_saude.index')
            ->with('success','Unidade de saúde salva com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UnidadeSaude  $unidade_saude
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function destroy(UnidadeSaude $unidade_saude)
    {
        if (Auth::check()) {
            $unidade_saude->delete();

            return redirect()->route('unidades_saude.index')
                ->with('success', 'Unidade de saúde removida com sucesso');
        } else {
            return $this->noAuth();
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function noAuth()
    {
        return redirect()
            ->route('unidades_saude.index')
            ->with('error', 'É preciso estar logado para realizar esta ação.');
    }
}
