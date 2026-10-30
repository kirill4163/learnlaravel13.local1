<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return '!!!!!!!!!!!!!!!!!';
});
/* 47. Введение в Blade в Laravel */
Route::get( '/users', [UserController::class, 'index']); //users


// Обращение к контроллерам
Route::get('/newpost', [PostController::class, 'show']);
Route::get('/allposts', [PostController::class, 'all']);
Route::get('/longpost', [PostController::class, 'show']);

Route::get('/rarepost/{id}', [PostController::class, 'shows'])
    ->whereNumber('id');

Route::get('/rarepost/{surname}/{name}', [PostController::class, 'newshow']);

Route::get('/oldpost/{id}', [PostController::class, 'oldshow'])
    ->whereNumber('id');

Route::get('/oldpost', [TestController::class, 'show']);
Route::get('/oldpost/newpost/1', [TestController::class, 'oldshow']);


// 39. Представления в Laravel
Route::get('/views', [TestController::class, 'view']);
Route::get('/newviews', [TestController::class, 'newview']);


// 41. Структура представлений
Route::get('/example', [PostController::class, 'example']);

Route::get('/example/1', function () {
    return view('components.layout');
});


/*
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', function(){
    return view('migrate');
});




Route::get('/about', function () {
    return 'about page';
});

Route::get('/about/{id}', function ($id) {
    return 'Номер страницы ' . $id;
})->whereNumber('id');

Route::get('/animals/{catId}/{mouseId?}', function ($catId, $mouseId = 1) {
    return 'ID кошки: ' . $catId . ' ID мыши: ' . $mouseId;
});


// Ограничение параметров маршрутов в Laravel
Route::get('/post/{id}', function ($id) {
    return 'post ' . $id;
})->where('id', '[0-9]+');


// Ограничения на несколько параметров
Route::get('/post/{slug}/{id}', function ($slug, $id) {
    return 'post ' . $slug . ' id ' . $id;
})->where('slug', '[a-z0-9_-]+')
    ->where('id', '[0-9]+');


// Шаблонные ограничения параметров маршрутов
Route::get('/posts/{id}', function ($id) {
    return 'posts ' . $id;
})->whereNumber('id');

Route::get('/posts/{slug}', function ($slug) {
    return 'posts ' . $slug;
})->whereAlpha('slug');

// Для проверки букв и цифр используем отдельный адрес
Route::get('/posts-alpha-numeric/{slug}', function ($slug) {
    return 'posts ' . $slug;
})->whereAlphaNumeric('slug');

Route::get('/users/{order}', function ($order) {
    return 'sort: ' . $order;
})->whereIn('order', ['name', 'surname', 'age']);


// Разрешение конфликтов маршрутов
// Сначала конкретный маршрут, затем маршрут с параметром
Route::get('/get/all', function () {
    return 'all';
});

Route::get('/get/{id}', function ($id) {
    return 'id ' . $id;
})->whereNumber('id');


// Группировка маршрутов в Laravel
Route::prefix('blog')->group(function () {
    Route::get('/post/all', function () {
        return 'all';
    });

    Route::get('/post/{id}', function ($id) {
        return $id;
    })->whereNumber('id');
});


// Именованные маршруты в Laravel
Route::get('/newblog/all/{id}', function ($id) {
    return 'blogs ' . $id;
})->name('blogs');


// Необязательный параметр
Route::get('/catalog/{category?}', function ($category = 'all') {
    return 'Категория: ' . $category;
});


// Ограничения параметров
Route::get('/category/{slug}', function ($slug) {
    return 'Категория: ' . $slug;
})->whereAlpha('slug');

Route::get('/product/{slug}', function ($slug) {
    return 'Товар: ' . $slug;
})->whereAlphaNumeric('slug');


// Глобальное ограничение параметра id
Route::pattern('id', '[0-9]+');


// Именованный маршрут профиля
Route::get('/profile', function () {
    return 'Профиль пользователя';
})->name('profile');


// Группа административных маршрутов
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return 'Панель администратора';
    });

    Route::get('/users', function () {
        return 'Список пользователей';
    });

    Route::get('/posts', function () {
        return 'Список постов';
    });
});


// Маршруты контроллеров
Route::get('/posts-list', [PostController::class, 'index'])
    ->name('posts.index');

Route::get('/posts-create', [PostController::class, 'create'])
    ->name('posts.create');

Route::get('/posts-show/{id}', [PostController::class, 'shows'])
    ->whereNumber('id')
    ->name('posts.show');

Route::get('/users-list', [TestController::class, 'show'])
    ->name('users.index');


// Дополнительные маршруты для контроллеров
Route::get('/page-info', [PageController::class, 'index'])
    ->name('page.index');

Route::get('/user-info/{name}/{id}', [UserController::class, 'show'])
    ->where([
        'name' => '[a-zA-Z]+',
        'id' => '[0-9]+'
    ])
    ->name('user.show');


