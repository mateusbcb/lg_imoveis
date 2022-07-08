<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Business extends Model
{
    use HasFactory;

    protected $table = 'business';

    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];

    public function property()
    {
        $this->hasOne(Property::class);
    }
}
