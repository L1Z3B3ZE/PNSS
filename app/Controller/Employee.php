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
use Src\Validator\Validator;


class Employee
{
    public function doctors(): string
    {
        $patients = Patient::all();
        $searchPatientId = isset($_GET['patient_id']) ? $_GET['patient_id'] : null;
        $doctors = [];

        if ($searchPatientId) {
            $patient = Patient::find($searchPatientId);
            if ($patient) {
                $appointments = Appointment::where('patient_id', $searchPatientId)->get();
                if ($appointments->isEmpty()) {
                    return new View('site.doctors', ['message' => 'У этого пациента нет записей на прием', 'searchPatientId' => $searchPatientId, 'doctors' => $doctors, 'patients' => $patients]);
                }
                $doctorIds = $appointments->pluck('doctor_id')->toArray();
                $doctors = Doctor::whereIn('id', $doctorIds)->get();
            } else {
                return new View('site.doctors', ['message' => 'Пациент с таким ID не найден', 'searchPatientId' => $searchPatientId, 'doctors' => $doctors, 'patients' => $patients]);
            }
        }
        else {
            $doctors = Doctor::all();
        }

        return new View('site.doctors', ['doctors' => $doctors, 'patients' => $patients, 'searchPatientId' => $searchPatientId]);
    }



    public function addDoctor($request): string {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'birth_date' => ['birthdate', 'required'],
            ],[
                'required' => 'Поле не может быть пустым',
                'birthdate' => 'Некорректная дата'
            ]);

            if($validator->fails()){
                $errors = $validator->errors();
            }

            if (empty($errors) && $doctor = Doctor::create($request->all())) {
                // Сохраняем ID врача в сессию
                $_SESSION['doctor_id'] = $doctor->id;
                app()->route->redirect('/addSpecialtyPosition');
            }
        }
        return new View('site.add_doctor', ['errors' => $errors]);
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

    public function addPatient(Request $request): string {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
                'birth_date' => ['birthdate', 'required'],
            ],[
                'required' => 'Поле не может быть пустым',
                'birthdate' => 'Некорректная дата'
            ]);

            if($validator->fails()){
                $errors = $validator->errors();
            }

            if (empty($errors) && Patient::create($request->all())) {
                app()->route->redirect('/patients');
            }
        }
        return new View('site.add_patient', ['errors' => $errors]);
    }

    public function editPatient(): string
    {
        return new View('site.edit_patient');

    }

    public function appointments(): string {
        $searchDoctorId = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : null;
        $searchDate = isset($_GET['appointment_date']) ? $_GET['appointment_date'] : null;
        $searchStatus = 'новая';

        if($searchDoctorId && $searchDate){
            $appointments = Appointment::where('doctor_id', $searchDoctorId)->where('appointment_date', $searchDate)->whereHas('status', function ($query) use ($searchStatus) {
                $query->where('status', $searchStatus);
            })->get();
        } else {
            $appointments = Appointment::whereHas('status', function ($query) use ($searchStatus) {
                $query->where('status', $searchStatus);
            })->get();
        }

        $patients = Patient::all()->mapWithKeys(function ($patient) {
            return [$patient->id => ['name' => $patient->name, 'surname' => $patient->surname, 'patronymic' => $patient->patronymic, 'birth_date' => $patient->birth_date]];
        });

        $doctors = Doctor::all()->mapWithKeys(function ($doctor) {
            return [$doctor->id => ['name' => $doctor->name, 'surname' => $doctor->surname, 'patronymic' => $doctor->patronymic]];
        });

        $statuses = Status::all()->mapWithKeys(function ($status) {
            return [$status->id => ['status' => $status->status]];
        });

        return new View('site.appointments', ['patients'=>$patients, 'doctors'=>$doctors, 'appointments'=>$appointments, 'statuses'=>$statuses, 'searchDoctorId' => $searchDoctorId, 'searchDate' => $searchDate]);
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