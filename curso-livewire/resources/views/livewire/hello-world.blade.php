
<div style="text-align: center">
@if(session('success'))
<span>{{session('success')}}</span>
@endif
    <form action="" wire:submit.prevent="createUser" class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Nome:</label>
            <input wire:model="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" placeholder="Nome">
            @error('name')
            <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email:</label>
            <input wire:model="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" id="email" placeholder="Email">
            @error('email')
            <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Senha:</label>
            <input wire:model="password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="password" id="password" placeholder="Senha">
            @error('password')
            <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="image">Upload image</label>
            <input wire:model="image" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" id="image" placeholder="image">
            @error('image')
            <span class="text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Criar</button>
        </div>

    </form>

<div class="flex flex-col justify-center items-center space-x-4">
@foreach ($users as $user)
<h3>{{ $user->name }}</h3>
<button wire:click="deleteUser('{{$user->name}}')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">Deletar</button>
@endforeach
{{$users->links()}}
</div>
</div>
