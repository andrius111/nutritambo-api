<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_pessoa';

    /** @var array */
    protected $fillable = [
        'nm_pessoa',
        'nm_fantasia',
        'nm_razao_social',
        'nr_cpf_cnpj',
        'nr_inscricao_estadual',
        'ds_observacao',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contatos()
    {
        return $this->hasMany(\App\PessoaContato::class, 'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(\App\PessoaEmail::class,  'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function enderecos()
    {
        return $this->hasMany(\App\PessoaEndereco::class,  'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function telefones()
    {
        return $this->hasMany(\App\PessoaTelefone::class,  'cd_pessoa');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fornecedor()
    {
        return $this->belongsTo(\App\Fornecedor::class, 'cd_pessoa');
    }
}
