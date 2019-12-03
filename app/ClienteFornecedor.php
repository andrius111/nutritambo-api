<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClienteFornecedor extends Model
{
    /** @var string */
    protected $table = 'cliente_fornecedores';

    /** @var array */
    protected $primaryKey = ['cd_cliente', 'cd_fornecedor'];

    /** @var bool */
    public $incrementing = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cliente()
    {
        return $this->belongsTo(\App\Cliente::class, 'cd_cliente', 'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fornecedor()
    {
        return $this->belongsTo(\App\Fornecedor::class, 'cd_fornecedor', 'cd_pessoa');
    }
}
