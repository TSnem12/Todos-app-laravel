<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class TodosController extends Controller
{
    public function index() {

        return view('todos.index')->with('todos', Todo::all());
    }

    public function show($todoId) {
        return view('todos.show')->with('todo', Todo::find($todoId));
    }

    public function create() {
        return view('todos.create');
    }

    public function store() {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);


        $data = request()->all();

        $todo = new Todo();
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        $todo->save();

        return redirect('/todos');

    }





}
