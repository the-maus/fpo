@extends('base')

@section('header', 'Unidades de saúde')

@section('conteudo')
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <p>{{ $message }}</p>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <table class="table table-striped" style="table-layout: fixed">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Código CNES</th>
            <th scope="col">Nome</th>
            <th scope="col">Endereço</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($unidades_saude as $unidade_saude)
            <tr>
                <td>{{$unidade_saude->id}}</td>
                <td>{{$unidade_saude->codigo_cnes}}</td>
                <td>{{$unidade_saude->nome}}</td>
                <td>{{$unidade_saude->endereco}}</td>
                <td>
                    <div class="row">
                        <a class="btn btn-primary" style="height:40px" role="button" href="{{route('unidades_saude.edit', $unidade_saude->id)}}">
                            <i class="material-icons">edit</i>&nbsp;Editar</a>&nbsp;
                        <form action="{{ route('unidades_saude.destroy', $unidade_saude->id) }}"
                              onsubmit="return window.confirm('Deseja realmente remover a unidade de saúde?')" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="material-icons">delete</i>&nbsp;Remover</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
