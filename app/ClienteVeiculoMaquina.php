<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteVeiculoMaquina extends Model
{
    /** @var string */
    protected $table = 'cliente_veiculos_maquinas';

    /** @var string */
    protected $primaryKey = 'cd_cliente_veiculo_maquina';

    /** @var array */
    protected $guarded = [
        'cd_cliente_veiculo_maquina'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'cd_pessoa');
    }
}
