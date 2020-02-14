<?php

Route::get('/tasks', 'TasksController@index');
Route::get('/tasks/{task}', 'TasksController@show');

/*Route::get('/tasks', function () {
    //$tasks = \Illuminate\Support\Facades\DB::table('tasks')->get(); // простой запрос
    $tasks = App\Task::incomplete(); // делаем запрос в модель task по всем значениям                  перенесено в контроллер app/Http/Controllers
    return view('tasks.index', compact('tasks')); // путь задается через точку, обычно tasks/index
});*/

Route::get('/test', function () {
    //$tasks = \Illuminate\Support\Facades\DB::table('tasks')->get(); // простой запрос
    $tests = App\Test::all(); // делаем запрос в модель test по всем значениям
    return view('test.index', compact('tests')); // путь задается через точку, обычно tasks/index
});

Route::get('/test/{test}', function ($id) { // добавляем $id для перехода на определенную запись по ид
    //$task = \Illuminate\Support\Facades\DB::table('tasks')->find($id); // ищем запись и подставлем ее в строку запроса (простой запрос)
    $test = App\Test::find($id); // запрос в модель по определенному id
    //dd($task); // выводим на экран наподобие var_dump
    return view('test.show', compact('test'));
});

Route::get('/hello', function () {
    /*return view('hello', [                 // передаем данные разными способами сп. 1
        'name' => 'Alex'
    ]);*/

    //return view('hello')->with('name', 'John');     // сп. 2

    /*$name = 'Johny Cage';                   // сп. 3
    return view('hello', [
        'name' => $name
    ]);*/

    $int = [                                 // сп. 4
        'one',
        'two',
        'three'
    ];
    return view('hello', compact('int'));
});
