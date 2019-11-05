<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaEndereco extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_endereco';

    /** @var array */
    protected $fillable = [
        'cd_pessoa',
        'id_principal',
        'id_tipo',
        'ds_endereco',
        'nr_endereco',
        'ds_complemento',
        'nm_bairro',
        'nr_cep',
        'cd_cidade',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(\App\Pessoa::class, 'cd_pessoa');
    }
}
