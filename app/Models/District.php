<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'name',
        'city_id',
        'created_at',
        'updated_at'
    ];

    public function city()
    {
        $foreign_key = 'city_id';
        $owner_key = 'id';
        return $this->belongsTo('App\Model\City', $foreign_key, $owner_key);
    }
}
