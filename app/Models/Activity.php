<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'time',
        'type',
        'price',
        'maxppl',
        'participants'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
