@extends('base')

@section('header', 'Cadastrar FPO')

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

    <form action="{{ route('fpos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="unidade_saude">Unidade de saúde</label>
            <select id="unidade_saude" name="unidade_saude_id" required class="form-control">
                @foreach($unidades as $unidade)
                    <option value="{{$unidade->id}}">{{$unidade->nome}}</option>
                @endforeach
            </select>
            <div class="form-group">
                <label for="nivel_apuracao">Nível de apuração</label>
                <input required type="number" class="form-control" id="nivel_apuracao" name="nivel_apuracao" placeholder="Nível de apuração da FPO">
            </div>
            <div class="form-group">
                <label for="cmpt_ini">Competência</label>
                <input required type="month" class="form-control" id="cmpt_ini" name="cmpt_ini">
            </div>
            <div class="form-group">
                <label for="valor_total">Valor total</label>
                <input readonly type="number" step="any" class="form-control" id="valor_total" name="valor_total">
            </div>

        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
@endsection
