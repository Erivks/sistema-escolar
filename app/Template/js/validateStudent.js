(function($) {
    jQuery.validato.addMethod('Date', function(value, element) {
        var pattern = new RegExp('[0-9]{2}/[0-9]{2}/[0-9]{4}');
        return this.optinal(element) || pattern.test(value);
    }, "Exemplo: 99/99/9999");

    $.fn.studentValidation = () => {
        $(this).validate({
            debug: false,
            errorClass: 'is-invalid',
            validClass: 'is-valid',
            errorElement: 'small',
            submitHandler: () => {
                $(this).submit();
            },
            rules: {
                nameInput: {
                    required: true,
                },
                birthdayInput: {
                    required: true,
                    Date: true
                }
            },
            message: {
                nameInput: {
                    required: "Preencha o nome do aluno"
                },
                birthdayInput: {
                    required: "Preencha a data de nascimento do aluno"
                }
            },
            errorPlacement: function(error, element) {
                error.addClass('form-text').css('color', '#FF0000');
                error.insertAfter(element);
            },
            highlight: function(error, errorClass, validClass) {
                error.addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function(error, errorClass, validClass){
                error.addClass(validClass).removeClass(errorClass);
            }
        })
    }
}(jQuery));