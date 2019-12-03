<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteComposicaoAcionaria extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_cliente_composicao_acionaria';

    /** @var array */
    protected $guarded = [
        'cd_cliente_composicao_acionaria'
    ];

    /** @var array */
    protected $with = [
        'uf'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'cd_pessoa');
    }
}
