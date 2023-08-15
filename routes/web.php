<?php

use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get("/", [ProdutosController::class, 'index'])->name('produto.index');
    //cadastro
    Route::get("/cadastrarProduto", [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post("/cadastrarProduto", [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    //atualizar
    Route::get("/atualizarProduto/{id}", [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put("/atualizarProduto/{id}", [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    Route::delete("/delete", [ProdutosController::class, 'delete'])->name('produto.delete');
});


Route::prefix('clientes')->group(function () {
    Route::get("/", [ClientesController::class, 'index'])->name('clientes.index');
    //cadastro
    Route::get("/cadastrarCliente", [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post("/cadastrarCliente", [ClientesController::class, 'cadastrarCliente'])->name('cadastrar.cliente');

    //atualizar
    Route::get("/atualizarCliente/{id}", [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put("/atualizarCliente/{id}", [ClientesController::class, 'atualizarCliente'])->name('atualizar.cliente');

    Route::delete("/delete", [ClientesController::class, 'delete'])->name('cliente.delete');
});
