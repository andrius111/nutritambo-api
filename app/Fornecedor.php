<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    /** @var string */
    protected $table = 'fornecedores';

    /** @var string */
    protected $primaryKey = 'cd_pessoa';

    /** @var array */
    protected $fillable = [
        'cd_pessoa',
        'id_ativo',
    ];

    /** @var array */
    protected $with = [
        'pessoa'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pessoa()
    {
        return $this->hasOne(\App\Pessoa::class, 'cd_pessoa');
    }
}
