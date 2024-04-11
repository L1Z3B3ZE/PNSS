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

}