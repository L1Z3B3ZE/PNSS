<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctors_specialty extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'doctor_id',
        'specialty_id'
    ];
}
