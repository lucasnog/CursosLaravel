<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestCliente;
use App\Models\Componentes;
use App\Models\Cliente;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function  __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    public function index(Request  $request)
    {


        $pesquisar = $request->pesquisar;
        $findCliente = $this->cliente->getClientesPesquisarIndex(search: $pesquisar ?? '');
        return view('pages.clientes.paginacao', compact('findCliente'));
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $buscarRegistro = Cliente::find($id);
        $buscarRegistro->delete();
        Toastr::success('Cliente deletado com sucesso');
        return response()->json(['sucess' => true]);
    }

    public function cadastrarCliente(FormRequestCliente $request)
    {
        if ($request->method() == "POST") {
            $data = $request->all();


            Cliente::create($data);
            Toastr::success('Gravado com sucesso');
            return redirect()->route('clientes.index');
        }

        return view('pages.clientes.create');
    }

    public function atualizarCliente(FormRequestCliente $request, $id)
    {
        if ($request->method() == "PUT") {
            //atualiza os dados
            $data = $request->all();
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);

            $buscaCliente = Cliente::find($id);
            $buscaCliente->update($data);
            Toastr::success('Gravado com sucesso');

            return redirect()->route('cliente.index');
        }

        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));
    }
}
