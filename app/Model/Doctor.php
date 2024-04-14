<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'birth_date',
    ];

    public function specialties()
    {
        return $this->belongsToMany(Specialty::class, Doctors_specialty::class);
    }

    public function positions()
    {
        return $this->belongsToMany(Position::class, Current_position::class);
    }
}

