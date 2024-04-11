<?php

namespace Controller;

use Src\Request;
use Src\View;
use Model\Doctor;


class Employee
{
    public function doctors(): string
    {
        return new View('site.doctors');

    }

    public function addDoctor(): string
    {
        return new View('site.add_doctor');
    }

    public function patients(): string
    {
        return new View('site.patients');

    }

    public function addPatient(): string
    {
        return new View('site.add_patient');

    }

    public function editPatient(): string
    {
        return new View('site.edit_patient');

    }
}