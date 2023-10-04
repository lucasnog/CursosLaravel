<?php

namespace App\Livewire;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\User;
use Livewire\Attributes\Rule;

class HelloWorld extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required|email|unique:users')]
    public $email;

    #[Rule('required|min:2')]
    public $password;

    #[Rule('nullable|sometimes|image|max:1024')]
    public $image;



    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'name.max' => 'O campo nome não pode ter mais de :max caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'Por favor, insira um endereço de email válido.',
            'email.unique' => 'Este endereço de email já está em uso.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
        ];
    }

    public function createUser()
    {
        $this->validate();

        if ($this->image) {
            $validated['image'] = $this->image->storeAs('uploads', 'public');
        }

        User::create([
            
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);
        $this->reset(['name', 'email', 'password']);
        session()->flash('success', 'User Created Successfully!');
    }


    public function deleteUser($name)
    {
        $user = User::whereName($name)->first();

        if ($user) {
            $user->delete();
        }
    }


    public function render()
    {
        $users = User::paginate(5);

        return view('livewire.hello-world', [
            'users' => $users
        ]);
    }
}
