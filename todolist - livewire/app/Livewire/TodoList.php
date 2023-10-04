<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $editTodo;

    #[Rule('required|min:3|max:50')]
    public $newName;

    public $search;

    public function create()
    {
        $validated = $this->validateOnly('name');
        Todo::create($validated);
        $this->reset('name');

        session()->flash('success', 'Tarefa criada com sucesso.');
        $this->resetPage();
    }

    public function messages()
    {
        return [
            'name.required' => 'Este campo é obrigatório.',
            'name.min' => 'Este campo deve ter pelo menos :min caracteres.',
            'name.max' => 'Este campo não pode ter mais de :max caracteres.',
            'newName.required' => 'Este campo é obrigatório.',
            'newName.min' => 'Este campo deve ter pelo menos :min caracteres.',
            'newName.max' => 'Este campo não pode ter mais de :max caracteres.',
        ];
    }

    public function toggle($id)
    {
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    function delete($id)
    {
        $todo = Todo::find($id);

        if ($todo) {
            $todo->delete();
        }
    }

    function cancel()
    {
        $this->editTodo = '';
    }
    function update()
    {

        $this->validateOnly('newName');
        Todo::find($this->editTodo)->update([
            'name' => $this->newName
        ]);

        $this->editTodo = '';
    }

    public function edit($id)
    {
        try {
            $todo = Todo::findOrFail($id);
            $this->editTodo = $id;
            $this->newName = $todo->name;
        } catch (Exception $e) {
            session()->flash('error', 'Algo deu errado.');
        }
    }

    public function render()
    {

        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name', 'like', "%{$this->search}%")->paginate(5)
        ]);
    }
}
