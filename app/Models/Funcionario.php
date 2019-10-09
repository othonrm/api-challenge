<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = [
        'nome',
        'sobrenome',
        'data_nascimento',
        'sexo',
    ];

    protected $hidden = [
        'data_nascimento',
        'created_at',
        'updated_at',
    ];

    protected $appends = [
        'idade',
    ];

    public function getIdadeAttribute()
    {
        return \Carbon\Carbon::createFromFormat("Y-m-d", $this->data_nascimento)->age;
    }
}
