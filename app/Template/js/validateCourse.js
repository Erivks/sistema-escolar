(function($){
    $.fn.validationCourse = () => {
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
                    required: true
                },
                workloadInput: {
                    required: true
                }
            },
            messages: {
                nameInput: {
                    required: "É preciso preencher o nome do curso"
                },
                workloadInput: {
                    required: "É preciso preencher a carga horária"
                }
            },
            errorPlacement: (error, element) => {
                error.addClass('form-text').css('color', '#FF0000');
                error.insertAfter(element);
            },
            highlight: (error, errorClass, validClass) => {
                error.addClass(errorClass).removeClass(validClass);
            },
            unhighlight: (error, errorClass, validClass) => {
                error.addClass(validClass).removeClass(errorClass);
            }
        });
    }
}(jQuery));