@extends('base')

@section('header', 'FPO')

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

    <div class="form-group">
        <div class="form-group">
            <h6 class="text-muted">Unidade de saúde</h6>
            <h3 class="my-0" style="font-weight: normal">{{$fpo->unidade_saude->nome}}</h3>
        </div>
        <br>
        <div class="form-group">
            <h6 class="text-muted">Nível de apuração</h6>
            <h3 class="my-0" style="font-weight: normal">{{$fpo->nivel_apuracao}}</h3>
        </div>
        <br>
        <div class="form-group">
            <h6 class="text-muted">Competência</h6>
            <h3 class="my-0" style="font-weight: normal">{{date('m/Y', strtotime($fpo->cmpt_ini))}}</h3>
        </div>
        <br>
        <div class="card">
            <h5 class="card-header">FPO</h5>
            <div class="card-body">
                <table id="table-added-procedimentos" class="table table-striped" style="table-layout: fixed">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Procedimento</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fpo->procedimentos as $procedimento)
                        <tr>
                            <td>{{$procedimento->id}}</td>
                            <td>{{$procedimento->codigo_procedimento}} - {{$procedimento->descricao}}</td>
                            <td>{{$procedimento->pivot->quantidade}}</td>
                            <td>@money($procedimento->valor_unitario * $procedimento->pivot->quantidade)</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <br>
        <div class="form-group">
            <h6 class="text-muted">Valor total</h6>
            <h3 class="my-0" style="font-weight: normal">@money($fpo->valor_total)</h3>
        </div>
    </div>
@endsection
