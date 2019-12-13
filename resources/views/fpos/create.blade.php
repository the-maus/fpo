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
            <div class="card">
                <h5 class="card-header">Procedimentos</h5>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search-procedimentos" placeholder="Pesquisar">
                    </div>
                    <table id="table-procedimentos" class="table table-striped header-fixed" style="table-layout: fixed">
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
                                        <button onclick="openModal(this)" type="button" class="btn btn-primary"
                                                data-toggle="modal"
                                                data-target="#add-procedimento-modal"
                                                data-id="{{$procedimento->id}}"
                                                data-valor="{{$procedimento->valor_unitario}}"
                                                data-codigo="{{$procedimento->codigo_procedimento}}"
                                                data-descricao="{{$procedimento->descricao}}">
                                            <i class="material-icons">add</i>&nbsp;Adicionar
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <br><br>
            <div class="card">
                <h5 class="card-header">FPO</h5>
                <div class="card-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="search-added-procedimentos" placeholder="Pesquisar">
                    </div>
                    <table id="table-added-procedimentos" class="table table-striped" style="table-layout: fixed">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Procedimento</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col">Valor total</th>
                            <th scope="col">Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="procedimentos"></div>
            <br><br>
            <div class="form-group">
                <label for="valor_total_label">Valor total</label>
                <input readonly type="text" class="form-control" id="valor_total_label">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>

    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/fpo.js') }}"></script>
@endpush

<!-- Modal -->
<div class="modal fade" id="add-procedimento-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar procedimento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="add-procedimento-form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="procedimento">Procedimento</label>
                        <input required type="text" readonly class="form-control" id="procedimento">
                    </div>
                    <div class="form-group">
                        <label for="quantidade">Quantidade</label>
                        <input required type="number" class="form-control" id="quantidade">
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor</label>
                        <input required type="text" readonly class="form-control" id="valor">
                    </div>
                    <input type="hidden" id="valor-modal">
                    <input type="hidden" id="id-procedimento">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="close-modal" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" onclick="addProcedimento()">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
