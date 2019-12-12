@extends('base')

@section('header', 'Cadastrar procedimento')

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Erro!</strong><br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <form action="{{ route('procedimentos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="codigo_procedimento">Código do procedimento</label>
            <input required type="text" maxlength="255" class="form-control" id="codigo_procedimento" name="codigo_procedimento" placeholder="Código do procedimento">
        </div>
        <div class="form-group">
            <label for="descricao">Descrição</label>
            <input required type="text" maxlength="255" class="form-control" id="descricao" name="descricao" placeholder="Descrição do procedimento">
        </div>
        <div class="form-group">
            <label for="valor_unitario">Valor unitário</label>
            <input required type="number" step="any" class="form-control" id="valor_unitario" name="valor_unitario" placeholder="Valor unitário do procedimento">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
@endsection
