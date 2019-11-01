<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_uf';

    /** @var array */
    protected $fillable = [
        'nm_uf',
        'ds_sigla',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cidades()
    {
        return $this->hasMany('App\Cidade');
    }
}
