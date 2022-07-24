<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cidade extends Model
{
    use HasFactory;

    protected $table = 'cidades';

    protected $fillable = [
        'cidade_id',
        'desc_cidade',
        'flg_estado',
    ];

    public function bairro()
    {
        $foreign_key = 'cidade_id';
        $local_key = 'id';
        return $this->HasMany('App\Models\Bairro', $foreign_key, $local_key);
    }

    public function city()
    {
        $foreign_key = 'cidade_id';
        $owner_key = 'id';
        return $this->belongsTo('App\Models\City', $foreign_key, $owner_key);
    }
}
