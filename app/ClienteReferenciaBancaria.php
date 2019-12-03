<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteReferenciaBancaria extends Model
{
    /** @var string */
    protected $table = 'cliente_referencias_bancarias';

    /** @var string */
    protected $primaryKey = 'cd_cliente_referencia_bancaria';

    /** @var array */
    protected $guarded = [
        'cd_cliente_referencia_bancaria'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'cd_pessoa');
    }
}
