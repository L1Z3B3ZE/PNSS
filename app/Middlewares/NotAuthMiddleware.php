<?php

namespace Middlewares;

use Src\Auth\Auth;
use Src\Request;

class NotAuthMiddleware
{
    public function handle(Request $request)
    {
        //Если пользователь авторизован, то редирект на главную страницу
        if (Auth::check()) {
            app()->route->redirect('/mainPage');
        }
    }
}
