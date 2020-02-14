<?php // создаем контроллер спомочью php artisan make:controller TasksController

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;

class TasksController extends Controller
{
    public function index(){
        $tasks = App\Task::all(); // делаем запрос в модель task по всем значениям
        return view('tasks.index', compact('tasks')); // путь задается через точку, обычно tasks/index
    }

    public function show($id){
        $task = App\Task::find($id); // запрос в модель по определенному id
        return view('tasks.show', compact('task'));
    }
}
