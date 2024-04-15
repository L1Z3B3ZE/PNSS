<?php

namespace Controller;

use Src\View;
use Src\Request;
use Model\User;
use Src\Validator\Validator;


class Admin
{
    public function addEmployee(Request $request): string {
        $errors = [];
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'name' => ['required'],
                'login' => ['required', 'unique:users,login'],
                'password' => ['required'],
                'surname' => ['required'],
                'patronymic' => ['required'],
            ],[
                'required' => 'Поле не может быть пустым',
                'unique' => 'Значение должно быть уникальным'
            ]);

            if($validator->fails()){
                $errors = $validator->errors();
            }

            if (empty($errors) && User::create($request->all())) {
                app()->route->redirect('/mainPage');
            }
        }
        return new View('site.add_employee', ['errors' => $errors]);
    }
}