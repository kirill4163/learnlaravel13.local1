<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function newshow($surname,$name)
    {
        return   $surname . ' ' . $name;
    }

    public function shows($id){
        return 'post ' . $id;
    }
    public function show(){
        return "hello world";
    }

    public function all(){
        return "all posts";
    }

    public function example(){
        return view( 'post.post');
    }
}
