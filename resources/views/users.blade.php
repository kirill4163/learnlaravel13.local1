<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Параграф</p>
 <ul>
        @foreach($users as $user)
        <li>{{ $user }}</li>
        @endforeach
  </ul>

<!-- 48. Вывод переменных в тегах Blade -->
<p>{{ $var1 }}</p>
<p>{{ $var2 }}</p>
<p>{{ $var3 }}</p>

<p class="{{ $cls }}"></p>
<input value="{{ $val }}"/>

<p>current timestamp:{{time()}}</p>
<p>today: {{date('d.m.Y')}}</p>
<p>full name:{{$first . ' ' . $last}}</p>
<p> length: {{strlen($first)}}</p>
<!-- 51. Арифметические операции в Blade в Laravel -->
<p>sum: {{ $a + $b }}</p>
<p>diff: {{ $a - $b }}</p>
<p>product: {{ $a * $b }}</p>
<p>quotient: {{ $a / $b }}</p>
<p>power: {{ $a ** $b }}</p>
<!-- 52. Работа с массивами в Blade -->
<p>first element: {{ $arr[0] }}</p>
<p>second element: {{ $arr[1] }}</p>
<p>summa elements: {{ $arr[0] + $arr[1] + $arr[2] + $arr[5] }}</p>
<p>quantity elements: {{ count($arr) }}</p>
<!-- 53. Проверка переменных в Blade -->
<p>{{ $var ? 'eee' : 'bbb' }}</p>
<p>{{ $var ?? 'eee' }}</p>
<p>{{ $year ?? date('Y') }}</p>
<!-- 54. Вывод неэкранированных данных в Blade -->
<p>Hello, {!! $name !!}!</p>
<!-- 55. Комментарии в Blade -->
<p>{{-- Комментарий --}}</p>
<p>@if($isAuth)
        Вы авторизованы
    @endif
    @if(!$isAuth)
        Вы не авторизованы
    @endif
</p>
<!-- 58. Директива @elseif в Blade -->
<p>
    @if ($num > 0)
        больше нуля
    @elseif ($num === 0)
        равняется нулю
    @else
        меньше нуля
    @endif
</p>
<!-- 60. Сложные команды в условиях Blade -->
@if(count($arr1) >= 1)
    в массиве есть записи
@else
    в массиве нет записей
@endif
<!-- 61. Директива @foreach -->
<p>
    @foreach ($arr2 as $elem)
        {{ $elem }}
    @endforeach
</p>
<p>
    @foreach ($arr2 as $elem)
        <b>{{ $elem }}</b>
    @endforeach
</p>
<p>
    @foreach ($arr2 as $elem)
        <li>{{ $elem }}</li>
    @endforeach
</p>
<!-- 63. Условия и циклы @foreach в Blade -->
<!-- положительные элементы массива -->
<ul>
    @foreach($arr3 as $elem)
        @if ($elem > 0)
            <li>{{ $elem }}</li>
        @endif
    @endforeach
</ul>
<!-- выводит, если кол-во элементов в массиве больше нуля -->
@if(count($arr3) > 0)
    <ul>
        @foreach($arr3 as $elem)
            <li>{{ $elem }}</li>
        @endforeach
    </ul>
@endif
<!-- 64. Вложенные циклы @foreach в Blade -->
<p>
    @foreach ($arr4 as $subArr)
        @foreach($subArr as $elem)
            {{ $elem }}
        @endforeach
    @endforeach
</p>
<ul>
    @foreach($arr4 as $subArr)
        <li>
            <ul>
                @foreach($subArr as $elem)
                    <li>{{$elem}}</li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
@dd($users)
<!-- 65. Перебор многомерных массивов -->
@foreach($users1 as $user)
    <li>{{ $user['name'] }} {{ $user['age'] }}</li>
@endforeach
<!-- 67. Переменная $loop в Blade -->
@foreach($arr5 as $elem)
    @if($loop->first)
        первая итерация
    @endif

    @if ($loop->last)
        последняя итерация
    @endif

    {{ $elem }}
@endforeach
<!-- 68. Директива @ break в Blade -->
<br>
<!-- break - позволяет завершать работу цикла -->
@foreach($arr6 as $elem)
    {{ $elem }}
    @if ($elem == 3)
        @break
    @endif
@endforeach
<!-- включение условия в строку объявления директивы -->
<br>
@foreach ($arr6 as $elem)
    {{ $elem }}
    @break($elem == 3)
@endforeach
<!-- 70. Цикл for в Blade -->
<!-- счетчик от 0 до 9 -->
@for($i = 0; $i < 10; $i++)
    <br>счетчик: {{ $i }}
@endfor
<!-- вывод для разметки -->
<ul>
    @for ($i = 1; $i <= 5; $i++)
        <li>элемент {{ $i }}</li>
@endfor
</ul>
<ul>
                       @for($i = 1; $i <=5; $i++)
                       <li>Элемент {{$i}}</li>
                       @endfor
</ul>
     @for($i =1; $i <= $count; $i++)
                       <p>шаг{{$i}}</p>
     @endfor





</body>
</html>
