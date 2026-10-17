<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return 'Список пользователей';
    }

    // Передача нескольких параметров
    public function show($name, $id)
    {
        return 'Имя: ' . $name . ', ID: ' . $id;
    }
}
