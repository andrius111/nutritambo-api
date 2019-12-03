<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_pessoa';

    /** @var array */
    protected $guarded = [
        'cd_pessoa'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function composicaoAcionarias()
    {
        return $this->hasMany(\App\ClienteComposicaoAcionaria::class, 'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fornecedores()
    {
        return $this->hasMany(\App\ClienteFornecedor::class, 'cd_cliente');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referenciasBancarias()
    {
        return $this->hasMany(\App\ClienteReferenciaBancaria::class, 'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function veiculosMaquinas()
    {
        return $this->hasMany(\App\ClienteVeiculoMaquina::class, 'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imoveis()
    {
        return $this->hasMany(\App\ClienteImovel::class, 'cd_pessoa');
    }
}
