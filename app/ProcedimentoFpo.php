<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * Class ProcedimentoFpo
 * @package App
 */
class ProcedimentoFpo extends Pivot
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'fpo_id', 'procedimento_id', 'quantidade'];
}
