<?php

namespace Controller;

use Model\Current_position;
use Model\Doctors_specialty;
use Model\Position;
use Model\Specialty;
use Model\User;
use Src\Request;
use Src\View;
use Model\Patient;
use Model\Appointment;
use Model\Doctor;
use Model\Status;


class Employee
{
    public function doctors(): string
    {
        return new View('site.doctors');

    }

    public function addDoctor($request): string
    {
        if ($request->method === 'POST') {
            $doctor = Doctor::create($request->all());
            if ($doctor) {
                // Сохраняем ID врача в сессию
                $_SESSION['doctor_id'] = $doctor->id;
                app()->route->redirect('/addSpecialtyPosition');
            }
        }
        return new View('site.add_doctor');
    }
    public function addSpecialtyPosition($request): string
    {
        if ($request->method === 'POST' && Current_position::create($request->all())&& Doctors_specialty::create($request->all())) {
            app()->route->redirect('/doctors');
        }
        $positions = Position::all();
        $specialties = Specialty::all();
        return new View('site.add_specialty_position', ['positions' => $positions, 'specialties' => $specialties]);
    }

    public function patients(): string
    {
        return new View('site.patients');

    }

    public function addPatient(Request $request): string
    {
        if ($request->method === 'POST' && Patient::create($request->all())) {
            app()->route->redirect('/patients');
        }
        return new View('site.add_patient');
    }


    public function editPatient(): string
    {
        return new View('site.edit_patient');

    }

    public function appointments(): string
    {
        return new View('site.appointments');

    }

    public function addAppointment(Request $request): string
    {
        if ($request->method === 'POST' && Appointment::create($request->all())) {
            app()->route->redirect('/appointments');
        }
        $doctors = Doctor::all();
        $patients = Patient::all();
        $users = User::all();
        return new View('site.add_appointment', ['doctors' => $doctors, 'patients' => $patients, 'users' => $users]);

    }

    public function cancelAppointment(): string
    {
        return new View('site.cancelAppointment');

    }
}