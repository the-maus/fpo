require('./bootstrap');
require('./jquery.inputmask.min');

$(function() {
    $('#valor_unitario').inputmask('decimal', {
        'alias': 'numeric',
        'groupSeparator': ',',
        'autoGroup': true,
        'digits': 2,
        'radixPoint': ".",
        'digitsOptional': false,
        'allowMinus': false,
        'prefix': 'R$ ',
        'placeholder': ''
    });
});
