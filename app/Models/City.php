<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'cidade_id',
        'name',
        'acronym_state',
        'created_at',
        'updated_at'
    ];

    public function properties()
    {
        $foreign_key = 'cidade_id';
        $local_key = 'id';

        return $this->HasMany('App\Models\Property', $foreign_key, $local_key);
    }

    public function districts()
    {
        $foreign_key = 'cidade_id';
        $local_key = 'id';
        return $this->HasMany('App\Models\District', $foreign_key, $local_key);
    }

    /*
    public function cidade()
    {
        $foreign_key = 'cidade_id';
        $local_key = 'id';
        return $this->HasOne('App\Models\Cidade', $foreign_key, $local_key);
    }
    */
}
