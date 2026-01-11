<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $fillable = [
        'review_id',
        'ip_address',
    ];
    public $timestamps = true;

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
