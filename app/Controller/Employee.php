<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\Doctor;


class Employee
{
    public function doctors(): string
    {
        $doctors = Doctor::all();
        return new View('site.doctors', ['doctors' => $doctors]);

    }

    public function addDoctor(Request $request): string
    {
        return new View('site.add_doctor');
    }
}