<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function trainer() {
        return $this->belongsTo(User::class,'id','trainer_id');
    }
    public function mate() {
        return $this->belongsTo(User::class,'id','mate_id');
    }
}
