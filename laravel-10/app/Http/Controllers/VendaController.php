<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{
    public function  __construct(Venda $venda)
    {
        $this->venda = $venda;
    }
    public function index(Request  $request)
    {


        $pesquisar = $request->pesquisar;
        $findVenda = $this->venda->getVendasPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.vendas.paginacao', compact('findVenda'));
    }



    public function cadastrarVenda(FormRequestVenda $request)
    {
        //cria dados
        if ($request->method() == "POST") {
            $data = $request->all();
            // $data['numero_da_venda'] = $findNumeracao  <-- ele usou esse, eu usei readonly na view
            Venda::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('vendas.index');
        }

        //mostra dados

        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();
        return view('pages.vendas.create', compact('findNumeracao', 'findProduto', 'findCliente'));
    }

    public function enviaComprovantePorEmail($id)
    {
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $produtoNome = $buscaVenda->produto->nome;
        $clienteEmail = $buscaVenda->cliente->email;
        $clienteNome = $buscaVenda->cliente->nome;

        $sendEmailData = [
            'produtoNome' => $produtoNome,
            'clienteNome' => $clienteNome,
        ];

        Mail::to($clienteEmail)->send(new ComprovanteDeVendaEmail($sendEmailData));

        Toastr::success('Enviado com sucesso');
        return redirect()->route('vendas.index');
    }
}
