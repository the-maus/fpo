@extends('base')

@section('header', 'Procedimentos')

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

    <div class="form-group">
        <input type="text" class="form-control" id="search-procedimentos" placeholder="Pesquisar">
    </div>
    <table class="table table-striped" id="table-procedimentos" style="table-layout: fixed">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Código do procedimento</th>
            <th scope="col">Descrição</th>
            <th scope="col">Valor unitário</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($procedimentos as $procedimento)
            <tr>
                <td>{{$procedimento->id}}</td>
                <td>{{$procedimento->codigo_procedimento}}</td>
                <td>{{$procedimento->descricao}}</td>
                <td>@money($procedimento->valor_unitario)</td>
                <td>
                    <div class="row">
                        <a class="btn btn-primary" style="height:40px" role="button" href="{{route('procedimentos.edit', $procedimento->id)}}">
                            <i class="material-icons">edit</i>&nbsp;Editar</a>&nbsp;
                        <form action="{{ route('procedimentos.destroy', $procedimento->id) }}"
                              onsubmit="return window.confirm('Deseja realmente remover o procedimento?')" method="POST">
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
@push('scripts')
    <script src="{{ asset('js/fpo.js') }}"></script>
@endpush
