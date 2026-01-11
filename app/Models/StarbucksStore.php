<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StarbucksStore extends Model
{
    use HasFactory;

    protected $table = 'starbucks_stores';
    protected $fillable = [
        'name',
        'address',
        'lat',
        'lng',
    ];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
