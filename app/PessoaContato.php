<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaContato extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_contato';

    /** @var array */
    protected $fillable = [
        'cd_pessoa',
        'nm_contato',
        'nr_telefone',
        'nr_celular',
        'ds_email',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pessoa()
    {
        return $this->belongsTo(\App\Pessoa::class, 'cd_pessoa');
    }
}
