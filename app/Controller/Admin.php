<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;


class Admin
{
    public function addEmployee(Request $request): string
    {
        $message = '';
        if ($request->method === 'POST') {
            if (empty($request->all()['name']) || empty($request->all()['login']) || empty($request->all()['password'])) {
                $message = 'Заполните все поля';
            } else if (User::create($request->all())) {
                app()->route->redirect('/mainPage');
            }
        }
        return new View('site.add_employee', ['message' => $message]);
    }
}