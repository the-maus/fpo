<?php

namespace App\Http\Controllers;

use App\Fpo;
use App\UnidadeSaude;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FpoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fpos = Fpo::all();

        return view('fpos.index', compact('fpos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function create()
    {
        if (Auth::check()) {
            $unidades = UnidadeSaude::all();
            return view('fpos.create', compact('unidades'));
        } else {
            return $this->noAuth();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'unidade_saude_id' => 'required',
            'valor_total' => 'required',
            'nivel_apuracao' => 'required',
            'cmpt_ini' => 'required',
        ]);

        $data = $request->all();

        $cmpt_ini = $request->input('cmpt_ini');
        $cmpt_ini = date('Y-m-d', strtotime($cmpt_ini));
        $data['cmpt_ini'] = $cmpt_ini;

        Fpo::create($data);

        return redirect()->route('fpos.index')
            ->with('success','FPO criado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fpo  $fpo
     * @return \Illuminate\Http\Response
     */
    public function show(Fpo $fpo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fpo  $fpo
     * @return \Illuminate\Http\Response
     */
    public function edit(Fpo $fpo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fpo  $fpo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fpo $fpo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fpo  $fpo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fpo $fpo)
    {
        //
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    private function noAuth()
    {
        return redirect()
            ->route('fpos.index')
            ->with('error', 'É preciso estar logado para realizar esta ação.');
    }
}
