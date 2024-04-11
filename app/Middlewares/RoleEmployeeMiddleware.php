<?php

namespace Middlewares;

use Src\Auth\Auth;

class RoleEmployeeMiddleware
{
    public function handle()
    {
        if (Auth::checkRole()) {
            app()->route->redirect('/mainPage');
        }
    }
}