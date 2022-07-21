<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

    protected $guarded = [];

    protected $fillable = [
        'name',
        'price',
        'condominium',
        'city_id',
        'category_id',
        'business_id',
        'area',
        'building_area',
        'district',
        'bedrooms',
        'bathrooms',
        'garages',
        'details',
        'installations',
        'images',
        'created_at',
        'updated_at'
    ];

    public function cities()
    {
        return $this->belongsto('App\Models\City', 'city_id', 'id');
    }

    public function categories()
    {
        return $this->belongsto('App\Models\Category', 'category_id', 'id');
    }

    public function business()
    {
        return $this->belongsto('App\Models\Business', 'business_id', 'id');
    }
}
