$(document).ready(function(){
    jQuery.validator.setDefaults({
        success: "valid",
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
            $('#btn-salvar').attr('disabled', true)
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
            $('#btn-salvar').attr('disabled', false)
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
            $('#btn-salvar').attr('disabled', true)
        }
    });

    $('.cpf').mask('000.000.000-00');
    var behavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        },
        options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(behavior.apply({}, arguments), options);
            }
        };

    $('.phone').mask(behavior, options);

    $.validator.addMethod("cpf", function(value) {
        value = value.replace(/([~!@#$%^&*()_+=`{}\[\]\-|\\:;'<>,.\/? ])+/g, "");

        if (value.length !== 11) {
            return false;
        }

        var sum = 0,
            firstCN, secondCN, checkResult, i;

        firstCN = parseInt(value.substring(9, 10), 10);
        secondCN = parseInt(value.substring(10, 11), 10);

        checkResult = function(sum, cn) {
            var result = (sum * 10) % 11;
            if ((result === 10) || (result === 11)) {result = 0;}
            return (result === cn);
        };

        if (value === "" ||
            value === "00000000000" ||
            value === "11111111111" ||
            value === "22222222222" ||
            value === "33333333333" ||
            value === "44444444444" ||
            value === "55555555555" ||
            value === "66666666666" ||
            value === "77777777777" ||
            value === "88888888888" ||
            value === "99999999999"
        ) {
            return false;
        }

        for ( i = 1; i <= 9; i++ ) {
            sum = sum + parseInt(value.substring(i - 1, i), 10) * (11 - i);
        }

        if ( checkResult(sum, firstCN) ) {
            sum = 0;
            for ( i = 1; i <= 10; i++ ) {
                sum = sum + parseInt(value.substring(i - 1, i), 10) * (12 - i);
            }
            return checkResult(sum, secondCN);
        }
        return false;

    }, "CPF inválido");
});