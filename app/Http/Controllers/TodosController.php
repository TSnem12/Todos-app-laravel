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

        session()->flash('success', 'Todo created successfully.');


        return redirect('/todos');

    }



    public function edit($todoId) {
        
        $todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update($todoId) {

        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = Todo::find($todoId);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();


        session()->flash('success', 'Todo updated successfully.');
      
        return redirect('/todos');
    }

    
    public function destroy($todoId) {
        $todo = Todo::find($todoId);

        $todo->delete();


        session()->flash('success', 'Todo deleted successfully.');

        return redirect('/todos');
    }

    public function complete(Todo $todo) {

        $todo->completed = true;

        $todo->save();

        session()->flash('success', 'Todo completed successfully.');

        return redirect('/todos');

    }
   



}
