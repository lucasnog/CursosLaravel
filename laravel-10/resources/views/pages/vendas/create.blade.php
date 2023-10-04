@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.venda') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Cadastrar nova Venda</h1>
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Numeração</label>
                <input value="{{ $findNumeracao }}" type="text"
                    class="form-control @error('numero_da_venda') is-invalid @enderror" name="numero_da_venda" readonly>
                @if ($errors->has('numero_da_venda'))
                    <div class="invalid-feedback">{{ $errors->first('numero_da_venda') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label">Produto</label>
                <select class="form-select" name="produto_id">
                    @foreach ($findProduto as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                    @endforeach
                    <option selected>Clique para Selecionar</option>

                </select>

            </div>

            <div class="mb-3">
                <label class="form-label">Cliente</label>
                <select class="form-select" name="cliente_id">
                    @foreach ($findCliente as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                    @endforeach
                    <option selected>Clique para Selecionar</option>

                </select>

            </div>
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </form>
@endsection
