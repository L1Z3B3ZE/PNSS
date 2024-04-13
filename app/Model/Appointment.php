<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'employee_id',
        'appointment_date',
        'appointment_time',
        'status_id'
    ];
}
