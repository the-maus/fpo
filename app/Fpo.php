<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Fpo
 * @package App
 */
class Fpo extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'unidade_saude_id', 'valor_total', 'nivel_apuracao', 'cmpt_ini'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function procedimentos()
    {
        return $this->belongsToMany(Procedimento::class)->using(ProcedimentoFpo::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function unidade_saude()
    {
        return $this->belongsTo(UnidadeSaude::class);
    }
}
