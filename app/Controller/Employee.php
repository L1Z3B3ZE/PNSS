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
        $searchPatientId = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

        if ($searchPatientId) {
            $patient = Patient::find($searchPatientId);
            if ($patient) {
                $appointments = Appointment::where('patient_id', $searchPatientId)->get();
                if ($appointments->isEmpty()) {
                    return new View('site.doctors', ['message' => 'У этого пациента нет записей на прием']);
                }
                $doctorIds = $appointments->pluck('doctor_id')->toArray();
                $doctors = Doctor::whereIn('id', $doctorIds)->get();
            } else {
                return new View('site.doctors', ['message' => 'Пациент с таким ID не найден']);
            }
        }
        else {
            $doctors = Doctor::all();
        }

        $patients = Patient::all();

        return new View('site.doctors', ['doctors' => $doctors, 'patients' => $patients, 'searchPatientId' => $searchPatientId]);
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
        if ($request->method === 'POST' && Current_position::create($request->all()) && Doctors_specialty::create($request->all())) {
            app()->route->redirect('/doctors');
        }
        $positions = Position::all();
        $specialties = Specialty::all();
        return new View('site.add_specialty_position', ['positions' => $positions, 'specialties' => $specialties]);
    }

    public function patients(): string
    {
        $searchPatientId = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;

        if ($searchPatientId) {
            $appointments = Appointment::where('patient_id', $searchPatientId)->get();
        }
        else {
            $appointments = Appointment::all();
        }
        $statuses = Status::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return new View('site.patients', ['patients' => $patients, 'appointments' => $appointments, 'doctors' => $doctors, 'statuses' => $statuses, 'searchPatientId' => $searchPatientId]);
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
        $appointments = Appointment::all();

        $patients = Patient::all()->mapWithKeys(function ($patient) {
            return [$patient->id => ['name' => $patient->name, 'surname' => $patient->surname, 'patronymic' => $patient->patronymic, 'birth_date' => $patient->birth_date]];
        });

        $doctors = Doctor::all()->mapWithKeys(function ($doctor) {
            return [$doctor->id => ['name' => $doctor->name, 'surname' => $doctor->surname, 'patronymic' => $doctor->patronymic]];
        });

        $statuses = Status::all()->mapWithKeys(function ($status) {
            return [$status->id => ['status' => $status->status]];
        });

        return new View('site.appointments', ['patients' => $patients, 'doctors' => $doctors, 'appointments' => $appointments, 'statuses' => $statuses]);
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

    public function cancelAppointment($appointmentId): string
    {
        // Получаем запись на прием по ID
        $appointment = Appointment::find($appointmentId);

        // Находим статус "отменена"
        $cancelledStatus = Status::where('status', 'отменена')->first();

        if ($appointment && $cancelledStatus) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Меняем статус записи на "отменена"
                $appointment->status_id = $cancelledStatus->id;
                $appointment->save();
                app()->route->redirect('/appointments');
                return new View('site.cancelAppointment', ['appointment' => $appointment]);
            } else {
                // Show confirmation page
                return new View('site.cancelAppointment', ['appointment' => $appointment]);
            }
        }

        // Если запись на прием или статус "отменена" не найдены, возвращаем ошибку
        return "Ошибка: запись на прием или статус 'отменена' не найдены.";
    }

}