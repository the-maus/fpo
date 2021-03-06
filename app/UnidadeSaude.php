<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UnidadeSaude
 * @package App
 */
class UnidadeSaude extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'codigo_cnes',
        'nome',
        'endereco',
        'diretor_clinico',
        'horario_funcionamento',
        'natureza_juridica',
    ];

    /**
     * @var array
     */
    public static $horarios_funcionamento = [
        'manha' => 'Pela manhã',
        'tarde' => 'Pela tarde',
        'manha_tarde' => 'Pela manhã e pela tarde',
        'sempre_aberta' => 'Sempre aberta'
    ];

    /**
     * @var array
     */
    public static $naturezas_juridicas = [
        'administracao_publica' => 'Administração pública',
        'filantropico' => 'Filantrópico',
        'privado' => 'Privado',
    ];
}
