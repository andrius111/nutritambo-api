<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_atividade';

    /** @var array */
    protected $fillable = [
        'nm_atividade',
        'nr_cfop',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clientes()
    {
        return $this->hasMany(\App\Cliente::class);
    }
}
