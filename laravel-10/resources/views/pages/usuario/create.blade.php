@extends('index')

@section('content')
    <form class="form" method="POST" action="{{ route('cadastrar.usuario') }}">
        @csrf
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Criar novo Usuario</h1>
        </div>
        <form>
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input value="{{ @old('nome') }}" type="text" class="form-control @error('nome') is-invalid @enderror"
                    name="nome">
                @if ($errors->has('nome'))
                    <div class="invalid-feedback">{{ $errors->first('nome') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input value="{{ @old('email') }}" type="text" class="form-control @error('email') is-invalid @enderror"
                    name="email">

                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" value="{{ @old('password') }}" type="text"
                    class="form-control @error('password') is-invalid @enderror" name="password">

                @if ($errors->has('password'))
                    <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-success">Cadastrar</button>
        </form>
    </form>
@endsection
