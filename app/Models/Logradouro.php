<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logradouro extends Model
{
    use HasFactory;

    protected $table = 'logradouros';

    protected $fillable = [
        'num_cep',
        'bairro_id',
        'desc_logradouro',
        'desc_tipo',
    ];
}
