<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientesSeeder extends Seeder
{

    public function run(): void
    {
        Cliente::create(
            [
                'nome' => 'Lucas Nogueira Lopes',
                'email' => 'lks@nog.com',
                'endereco' => 'rua a',
                'logradouro' => 'rua a',
                'cep' => '7484844844',
                'bairro' => 'jardin atlantico',
            ]
        );
        Cliente::create(
            [
                'nome' => 'doulas vieira',
                'email' => 'douglas@vieira.com',
                'endereco' => 'rua b',
                'logradouro' => 'rua b',
                'cep' => '7484851241',
                'bairro' => 'st afonsos',
            ]
        );
    }
}
