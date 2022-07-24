<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    use HasFactory;

    protected $table = 'bairros';

    protected $fillable = [
        'bairro_id',
        'cidade_id',
        'desc_bairro',
    ];

    public function cidade()
    {
        return $this->belongsTo('App\Model\Cidade', 'cidade_id', 'cidade_id');
    }
}
