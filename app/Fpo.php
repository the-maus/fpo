<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class Fpo
 * @package App
 */
class Fpo extends Pivot
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'unidade_saude_id', 'procedimento_id', 'quantidade', 'nivel_apuracao', 'cmpt_ini'];
}
