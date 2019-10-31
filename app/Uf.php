<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    protected $primaryKey = 'cd_uf';

    protected $fillable = ['nm_uf', 'ds_sigla'];
}
