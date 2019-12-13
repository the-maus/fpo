$(function() {
    $("#search-procedimentos").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-procedimentos tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });

    $("#search-added-procedimentos").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#table-added-procedimentos tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});

function openModal(button) {
    button = $(button);
    var codigo = button.data('codigo');
    var id = button.data('id');
    var descricao = button.data('descricao');
    var valor = button.data('valor');
    var modal = $('#add-procedimento-modal');

    modal.find('#procedimento').val(codigo+' - '+descricao);
    modal.find('#valor').val(formatMoney(valor));
    modal.find('#quantidade').change(atualizaValorModal).keyup(atualizaValorModal).val(1);
    modal.find('#valor-modal').val(valor);
    modal.find('#id-procedimento').val(id);
}

function atualizaValorModal() {
    var modal = $('#add-procedimento-modal');
    var quantidade = modal.find('#quantidade').val();
    var valor = modal.find('#valor-modal').val();
    valor = quantidade * valor;
    modal.find('#valor').val(formatMoney(valor));
}

function addProcedimento() {
    var modal = $('#add-procedimento-modal');
    var id_procedimento = modal.find('#id-procedimento').val();
    var procedimentos = $('#procedimentos');
    var added_procedimentos = $('#table-added-procedimentos');

    //adicionar/atualizar o input hidden
    var quantidade = modal.find('#quantidade').val();
    var input_procedimento = $('#procedimento-'+id_procedimento);
    if (input_procedimento.length) {
        quantidade = parseInt(quantidade) + parseInt(input_procedimento.val());
        input_procedimento.val(quantidade);
    } else {
        input_procedimento = '<input type="hidden" id="procedimento-' + id_procedimento + '" '+
            'name="procedimentos[' + id_procedimento + ']" value="' + quantidade + '">';
        procedimentos.append(input_procedimento);
    }

    //adicionar/atualizar na tabela
    added_procedimentos.find('tbody').append();
    var row_procedimento = added_procedimentos.find('tr#'+id_procedimento);
    var procedimento = modal.find('#procedimento').val();
    var valor_label = modal.find('#valor').val();
    var valor = parseFloat(modal.find('#valor-modal').val());
    quantidade = modal.find('#quantidade').val();

    if (row_procedimento.length) {
        var quantidade_existente = row_procedimento.find('td.quantidade');
        quantidade = parseInt(quantidade) + parseInt(quantidade_existente.text());
        quantidade_existente.text(quantidade);

        var valor_existente = row_procedimento.find('td.valor');
        valor = (valor*quantidade);
        valor_existente.text(formatMoney(valor));
    } else {
        row_procedimento = '<tr id="'+id_procedimento+'">'+
                                '<td>'+id_procedimento+'</td>'+
                                '<td>'+procedimento+'</td>'+
                                '<td class="quantidade">'+quantidade+'</td>'+
                                '<td class="valor">'+valor_label+'</td>'+
                                '<td>'+
                                    '<button class="btn btn-danger" onclick="removeProcedimento('+id_procedimento+')">'+
                                    '<i class="material-icons">delete</i>&nbsp;Remover</button>'+
                                '</td>'+
                           '</tr>';
        added_procedimentos.append(row_procedimento);
    }

    atualizarValorTotal();

    modal.find('#close-modal').click();
}

function removeProcedimento(id) {
    $('#procedimento-'+id).remove();
    $('#table-added-procedimentos').find('tr#'+id).remove();
    atualizarValorTotal();
}

function formatMoney(valor) {
    valor = parseFloat(valor).toFixed(2);
    return 'R$ '+valor.toString().replace('.', ',');
}

function atualizarValorTotal() {
    this.valor_total = 0;
    var self = this;
    $('#table-added-procedimentos tbody tr').each(function(){
        var valor = parseFloat($(this).find('td.valor').text().replace(',', '.').replace('R$ ', ''));
        self.valor_total += valor;
    });

    // $('#valor_total').val(this.valor_total);
    $('#valor_total_label').val(formatMoney(this.valor_total));
}
