<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteImovel extends Model
{
    /** @var string */
    protected $table = 'cliente_imoveis';

    /** @var string */
    protected $primaryKey = 'cd_cliente_imovel';

    /** @var array */
    protected $guarded = [
        'cd_cliente_imovel'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'cd_pessoa');
    }
}
