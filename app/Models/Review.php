<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'reviews';
    protected $fillable = [
        'user_id',
        'status_id',
        'starbucks_store_id',
        'message',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function starbucksStore()
    {
        return $this->belongsTo(StarbucksStore::class);
    }
}
