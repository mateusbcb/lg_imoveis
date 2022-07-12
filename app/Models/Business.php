<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function properties()
    {
        return $this->HasMany('App\Models\Property', 'business_id', 'id');
    }
}
