<?php

namespace App\Http\Controllers;

use App\Procedimento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class ProcedimentoController
 * @package App\Http\Controllers
 */
class ProcedimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedimentos = Procedimento::all();

        return view('procedimentos.index', compact('procedimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function create()
    {
        if (Auth::check()) {
            return view('procedimentos.create');
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
            'codigo_procedimento' => 'required',
            'descricao' => 'required',
            'valor_unitario' => 'required',
        ]);

        Procedimento::create($request->all());

        return redirect()->route('procedimentos.index')
            ->with('success','Procedimento criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function show(Procedimento $procedimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Procedimento  $procedimento
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function edit(Procedimento $procedimento)
    {
        if (Auth::check()) {
            return view('procedimentos.edit', compact('procedimento'));
        } else {
            return $this->noAuth();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Procedimento  $procedimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Procedimento $procedimento)
    {
        $request->validate([
            'codigo_procedimento' => 'required',
            'descricao' => 'required',
            'valor_unitario' => 'required',
        ]);

        $procedimento->update($request->all());

        return redirect()->route('procedimentos.index')
            ->with('success','Procedimento salvo com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Procedimento  $procedimento
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function destroy(Procedimento $procedimento)
    {
        if (Auth::check()) {
            $procedimento->delete();

            return redirect()->route('procedimentos.index')
                ->with('success', 'Procedimento removido com sucesso');
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
            ->route('procedimentos.index')
            ->with('error', 'É preciso estar logado para realizar esta ação.');
    }
}
