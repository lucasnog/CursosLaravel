<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDeProdutoCadastrado = $this->buscaTotalProdutoCadastrado();
        $totalDeClienteCadastrado = $this->buscaTotalClienteCadastrado();
        $totalDeVendasCadastrada = $this->buscaTotalVendasCadastrada();
        $totalDeUsuariosCadastrado = $this->buscaTotalUsuariosCadastrada();


        return view('pages.dashboard.dashboard', compact('totalDeProdutoCadastrado', 'totalDeClienteCadastrado', 'totalDeVendasCadastrada', 'totalDeUsuariosCadastrado'));
    }

    public function buscaTotalProdutoCadastrado()
    {
        $findProduto = Produto::all()->count();
        return $findProduto;
    }
    public function buscaTotalClienteCadastrado()
    {
        $findCliente = Cliente::all()->count();
        return $findCliente;
    }

    public function buscaTotalVendasCadastrada()
    {
        $findVenda = Venda::all()->count();
        return $findVenda;
    }

    public function buscaTotalUsuariosCadastrada()
    {
        $findUsuario = User::all()->count();
        return $findUsuario;
    }
}
