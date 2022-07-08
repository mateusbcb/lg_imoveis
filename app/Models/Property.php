<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\Category;
use App\Models\Business;

class Property extends Model
{
    use HasFactory;

    protected $table = 'properties';

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

    public function city()
    {
        $this->belongsTo(City::class);
    }

    public function category()
    {
        $this->belongsTo(Category::class);
    }

    public function business()
    {
        $this->belongsTo(Business::class);
    }
}
