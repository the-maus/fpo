<?php

namespace App\Http\Controllers;

use App\Fpo;
use App\Procedimento;
use App\UnidadeSaude;
use Illuminate\Database\Eloquent\Relations\Pivot;
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

        /** @var Fpo $fpo */
        foreach ($fpos as $fpo) {
            $valor_total = 0;
            foreach($fpo->procedimentos as $procedimento) {
                /** @var Pivot $pivot */
                $quantidade = $procedimento->pivot->quantidade;
                $valor = floatval($procedimento->valor_unitario);
                $valor_total += $valor * $quantidade;
            }
            $fpo->setValorTotal($valor_total);
            $fpo->save();
        }

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
            $procedimentos = Procedimento::all();
            return view('fpos.create', compact('unidades', 'procedimentos'));
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
            'nivel_apuracao' => 'required',
            'cmpt_ini' => 'required',
        ]);

        $data = $request->all();

        $cmpt_ini = $request->input('cmpt_ini');
        $cmpt_ini = date('Y-m-d', strtotime($cmpt_ini));
        $data['cmpt_ini'] = $cmpt_ini;
        $data['valor_total'] = 0;

        /** @var Fpo $fpo */
        $fpo = Fpo::create($data);

        if (!empty($data['procedimentos'])) {
            $quantidades_procedimentos = $data['procedimentos'];
            $ids_procedimentos = array_keys($quantidades_procedimentos);
            $procedimentos = Procedimento::findMany($ids_procedimentos);
            $valor_total = 0;
            foreach ($procedimentos as $procedimento) {
                $valor_total += $procedimento->valor_unitario * $quantidades_procedimentos[$procedimento->id];
            }

            $fpo->setValorTotal($valor_total);

            foreach ($quantidades_procedimentos as $id_procedimento => $quantidade) {
                $fpo->procedimentos()->attach($id_procedimento, ['quantidade' => $quantidade]);
            }

            $fpo->save();
        }

        return redirect()->route('fpos.index')
            ->with('success','FPO criada com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fpo  $fpo
     * @return \Illuminate\Http\Response|RedirectResponse
     */
    public function show(Fpo $fpo)
    {
        if (Auth::check()) {
            $valor_total = 0;
            foreach($fpo->procedimentos as $procedimento) {
                /** @var Pivot $pivot */
                $quantidade = $procedimento->pivot->quantidade;
                $valor = floatval($procedimento->valor_unitario);
                $valor_total += $valor * $quantidade;
            }
            $fpo->setValorTotal($valor_total);
            $fpo->save();

            return view('fpos.show', compact('fpo'));
        } else {
            return $this->noAuth();
        }
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
        if (Auth::check()) {
            $fpo->delete();

            return redirect()->route('fpos.index')
                ->with('success', 'FPO removida com sucesso');
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
            ->route('fpos.index')
            ->with('error', 'É preciso estar logado para realizar esta ação.');
    }

    private function calculateTotalValue() {

    }
}
