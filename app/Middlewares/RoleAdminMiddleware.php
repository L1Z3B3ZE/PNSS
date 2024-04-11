<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class RoleAdminMiddleware
{
    public function handle()
    {
        if (!Auth::checkRole()) {
            app()->route->redirect('/mainPage');
        }
    }
}