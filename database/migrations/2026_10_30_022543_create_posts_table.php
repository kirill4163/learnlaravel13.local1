<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('example', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT UNSIGNED BIGINT (primary key)

            // строковые типы
            $table->string('name'); // varchar(255)
            $table->string('username', length: 50)->unique(); // varchar(50) с уникальностью
            $table->char('country_side', length: 2); // CHAR(2) - тип char с фикс. длиной
            $table->text('description')->nullable(); // TEXT - до 65КБ, может быть пустым (значение null)
            $table->mediumText('bio')->nullable(); // MediumText - до 16МБ
            $table->longText('full_profile')->nullable(); // LongText - до 4 гб, может быть пустым

            // числовые типы
            $table->tinyInteger('age')->nullable(); // tinyint - малое число, от -128 до 127
            $table->integer('amount')->default(value: 0); // число int, по умолчанию 0
            $table->bigInteger('count'); // число BIGINT
            $table->decimal('price', total: 8, places: 2); // decimal(8, 2), 8 чисел до запятой, 2 числа после запятой
            $table->double('price', 8, 2); // double(8, 2), 8 чисел до запятой, 2 числа после запятой
            $table->float('price',  8, 2); // float(8, 2), 8 чисел до запятой, 2 числа после запятой
// если необходимо добавить свойство unsigned
            $table->unsignedInteger('int');


            // дата и время
            $table->date('birth_date'); // DATE - дата
            $table->time('birth_date'); // TIME - время
            $table->dateTime('birth_date'); // DATETIME - дата и время
            $table->timestamps(); // created_at и updated_at - информация, когда была создана данная таблица и когда была обновлена
            $table->softDeletes(); // deleted_at - информация, когда она была удалена

            // логические значения
            $table->boolean('is_active')->default(value: true); // 1 - является
            $table->boolean('is_admin')->default(value: false); // 0 - не является

            // ENUM
            $table->enum('is_admin', ['admin', 'moderator', 'user', 'manager'])->default(value: 'user');
            // ENUM - ограничивает значения только перечисленным списком

            // связи
            $table->foreignId('team_id')->constrained()->onDelete(action: 'cascade'); // базовая настройка связи
            // преимущественно, будем использовать ее
            // constrained - используется в миграциях для создания внешнего ключа с автоматическим определением целевой таблицы и столбца
            // метод применяется к определению поля foreignId и упрощает создание внешних ключей
            // автоматически определяет таблицу и столбец, на которые ссылается внешний ключ, на основе названия поля
            $table->foreignId('team_id')->constrained()->onDelete(action: 'cascade')->onUpdate(action: 'cascade');
            $table->foreignIdFor(model: \App\Models\User::class)->nullable()->constrained(); // nullable - принимает значение null

            // специальные типы
            $table->rememberToken(); // varchar(100) - токен, для реализации функции "Запомнить меня" при авторизации
            $table->binary('avatar')->nullable(); // BLOB - используется для хранения картинок, файлов, зашифрованных ключей










        });

    }

    /*
     *
     * отктат миграций в laravel
     *
     * php artisan:rollback
     * позволяет откатить последнюю отправленную пачку миграций
     *
     * php artisan migrate: rollback --step-5
     * позволяет сделать откат определенного числа миграций,
     * указав параметр step. (step=5 - отктат последних пяти миграций)
     *
     * php artisan migrate:reset
     * следующая команда отменит изменения всех миграций вашего приложения
     *
     * php artisan migrate:reset
     * данная команда отменит изменения всех миграций вашего приложения
     *
     * php artisan migrate:referesh
     * позволяет откатить все миграции, а затем выполнит их снова
     *
     * php artisan migrate:fresh
     * удаляет все таблицы и заново запускает миграции
     *
     * php artisan migrate
     * создает миграции
    */

    /*
     * Структура миграций
     *
     * Класс миграции содержит два метода: up и метод down. Метод up
     * используется  для добавления новых таблиц, столбцов или индексов в вашу базу данных,
     *  тогда как метод down, должен отменять операции, выполняемые методом up.
     */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('posts',function (Blueprint $table){
          $table->renameColumn('vozrast', 'age');
        });
        Schema::dropIfExists('posts');
    }
};
