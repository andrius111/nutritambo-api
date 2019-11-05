<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaEmail extends Model
{
    /** @var string */
    protected $primaryKey = 'cd_email';

    /** @var array */
    protected $fillable = [
        'cd_pessoa',
        'id_principal',
        'id_nfe',
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
