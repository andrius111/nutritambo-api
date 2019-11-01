<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_cidade';

    /** @var array */
    protected $fillable = [
        'cd_uf',
        'nm_cidade',
        'nr_ibge',
    ];

    /** @var array */
    protected $with = ['uf'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function uf()
    {
        return $this->belongsTo('App\Uf', 'cd_uf');
    }
}
