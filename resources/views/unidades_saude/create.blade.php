@extends('base')

@section('header', 'Cadastrar unidade de saúde')

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

    <form action="{{ route('unidades_saude.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nome">Nome</label>
            <input required type="text" maxlength="255" class="form-control" id="nome" name="nome" placeholder="Nome da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="codigo_cnes">Código CNES</label>
            <input required type="text" maxlength="255" class="form-control" id="codigo_cnes" name="codigo_cnes" placeholder="Código CNES da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="endereco">Endereço</label>
            <input required type="text" maxlength="255" class="form-control" id="endereco" name="endereco" placeholder="Endereço da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="diretor_clinico">Diretor clínico</label>
            <input required type="text" maxlength="255" class="form-control" id="diretor_clinico" name="diretor_clinico" placeholder="Diretor clínico da unidade de saúde">
        </div>
        <div class="form-group">
            <label for="horario_funcionamento">Horário de funcionamento</label>
            <select id="horario_funcionamento" name="horario_funcionamento" required class="form-control">
                @foreach($horarios_funcionamento as $key => $horario)
                    <option value="{{$key}}">{{$horario}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="natureza_juridica">Natureza jurídica</label>
            <select id="natureza_juridica" name="natureza_juridica" required class="form-control">
                @foreach($naturezas_juridicas as $key => $natureza)
                    <option value="{{$key}}">{{$natureza}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
@endsection
