@extends('base')

@section('header', 'FPOs')

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

    <table class="table table-striped">
        <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Unidade de saúde</th>
            <th scope="col">Competência</th>
            <th scope="col">Valor total</th>
            <th scope="col">Ação</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($fpos as $fpo)
            <tr>
                <td>{{$fpo->id}}</td>
                <td>{{$fpo->unidade_saude()->value('nome')}}</td>
                <td>{{date('m/Y', strtotime($fpo->cmpt_ini))}}</td>
                <td>@money($fpo->valor_total)</td>
                <td style="width: 300px;">
                    <div class="row">
                        <a class="btn btn-primary" style="height:40px" role="button" href="{{route('fpos.show', $fpo->id)}}">
                            <i class="material-icons">pageview</i>&nbsp;Visualizar</a>&nbsp;
                        <form action="{{ route('fpos.destroy', $fpo->id) }}"
                              onsubmit="return window.confirm('Deseja realmente remover a FPO?')" method="POST">
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
