<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // GET /users  1 usage
    public function index() {
        $users = ['John', 'Jane', 'Jim'];

        $data =[
           '$var1' => 'aaa',
            '$var2' => 'aaa',
            '$var3' => 'aaa',

            'cls' => 'active',
            'val' => 'text',

            'first' => 'john',
            'last' => 'smith',

            'a' => 10,
            'b' => 3,

            'arr' => [1,2,3,4,5,6,7,8],

            'var' => true,

            'name' => '<b>John</b>',
            /*53.Условия в Blade в Laravel */
            'isAuth' => true,
            /*53.Условия в Blade в Laravel */
            'num' => 5,
            /* 59. Директива @ unless - является отрицанием */
            'Auth' => false,
            /* 60. Сложные команды в условиях Blade */
            'arr1' => [1, 2, 3],
            /* 61. Директива @foreach */
            'arr2' => ['a', 'b', 'c', 'd', 'e', 'f'],
            /* 63. Условия и циклы @ foreach в Blade */
            'arr3' => [-1, 2, -3, 4, 5],
            /* 64. Вложенные циклы @ foreach в Blade */
            'arr4' => [[1, 2, 3], [4, 5, 6], [7, 8, 9]],
            /*65  Перебор многомерных массивов*/
            'users' =>[
                [
                    'name' => 'users1',
                    'age' => 21,
                ],
                [
                    'name'=> 'users2',
                    'age' => 22,
                ],
                [
                    'name'=> 'users3',
                    'age' => 23,
                ],
            ],
            'arr5' => ['a', 'b', 'c'],

            'arr6' => [1,2,3,4,5],

         ];
        return view( 'users', compact( 'users'),$data);
    }
}
