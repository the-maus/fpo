<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Procedimento
 * @package App
 */
class Procedimento extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['id', 'codigo_procedimento', 'descricao', 'valor_unitario'];
}
