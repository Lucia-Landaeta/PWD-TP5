$('#login').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        usNombre: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un nombre'
                },
                regexp: {
                    regexp: /^[a-zA-ZáéíóúàèìòùÀÈÌÒÙÁÉÍÓÚñÑüÜ_.\s]+$/,
                    message: 'Solo se permiten letras _ y .'
                }
            }
        },
        usPass: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar una psw'
                },
                // regexp: {
                //     regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                //     message: 'Se detectan caracteres invalidos'
                // }
            }
        },
        
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

