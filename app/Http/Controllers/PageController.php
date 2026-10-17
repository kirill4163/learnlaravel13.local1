<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Страница из контроллера';
    }

    public function about()
    {
        return 'Информация о сайте';
    }
}
