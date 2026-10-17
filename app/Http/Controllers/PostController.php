<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    // Вывод фамилии и имени
    public function newshow($surname, $name)
    {
        return $surname . ' ' . $name;
    }

    // Вывод поста по ID
    public function shows($id)
    {
        return 'post ' . $id;
    }

    // Приветствие
    public function show()
    {
        return "hello world";
    }

    // Вывод всех постов
    public function all()
    {
        return "all posts";
    }

    // Вывод представления post.post
    public function example()
    {
        return view('post.post');
    }

    // Список постов
    public function index()
    {
        return 'Список всех постов';
    }

    // Создание поста
    public function create()
    {
        return 'Создание нового поста';
    }

    // Вывод старого поста по ID
    public function oldshow($id)
    {
        return 'Старый пост ' . $id;
    }
}
