<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaTelefone extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_telefone';

    /** @var array */
    protected $fillable = [
        'cd_pessoa',
        'id_principal',
        'id_tipo',
        'nr_telefone',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(\App\Pessoa::class, 'cd_pessoa');
    }
}
