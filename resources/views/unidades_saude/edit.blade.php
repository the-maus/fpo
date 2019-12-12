@extends('base')

@section('header', 'Editar unidade de saúde')

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
    <form action="{{ route('unidades_saude.update', $unidade_saude->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nome">Nome</label>
            <input value="{{$unidade_saude->nome}}" required type="text" maxlength="255" class="form-control" id="nome" name="nome" placeholder="Nome da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="codigo_cnes">Código CNES</label>
            <input value="{{$unidade_saude->codigo_cnes}}" required type="text" maxlength="255" class="form-control" id="codigo_cnes" name="codigo_cnes" placeholder="Código CNES da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input value="{{$unidade_saude->endereco}}" required type="text" maxlength="255" class="form-control" id="endereco" name="endereco" placeholder="Endereço da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="diretor_clinico">Diretor clínico</label>
            <input value="{{$unidade_saude->diretor_clinico}}" required type="text" maxlength="255" class="form-control" id="diretor_clinico" name="diretor_clinico" placeholder="Diretor clínico da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="horario_funcionamento">Horário de funcionamento</label>
            <select id="horario_funcionamento" name="horario_funcionamento" required class="form-control">
                @foreach($horarios_funcionamento as $key => $horario)
                    <option value="{{$key}}" @if($key == $unidade_saude->horario_funcionamento) selected @endif>{{$horario}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="natureza_juridica">Natureza jurídica</label>
            <select id="natureza_juridica" name="natureza_juridica" required class="form-control">
                @foreach($naturezas_juridicas as $key => $natureza)
                    <option value="{{$key}}" @if($key == $unidade_saude->natureza_juridica) selected @endif>{{$natureza}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
