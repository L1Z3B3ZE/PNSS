<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Current_position extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'doctor_id',
        'position_id'
    ];
}
