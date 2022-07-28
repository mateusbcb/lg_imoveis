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
        'id',
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
        $foreign_key = 'city_id';
        $owner_key = 'id';
        return $this->belongsto('App\Models\City', $foreign_key, $owner_key);
    }

    public function categories()
    {
        $foreign_key = 'category_id';
        $owner_key = 'id';
        return $this->belongsto('App\Models\Category', $foreign_key, $owner_key);
    }

    public function business()
    {
        $foreign_key = 'business_id';
        $owner_key = 'id';
        return $this->belongsto('App\Models\Business', $foreign_key, $owner_key);
    }
}
