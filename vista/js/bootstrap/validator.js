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
                regexp: {
                    regexp: /^([a-z]+[0-9]+)|([0-9]+[a-z]+)/i,
                    message: 'La contraseña debe contener letras y números'
                }
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


$('#actualizarLog').bootstrapValidator({
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
        usMail: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un correo'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/,
                    message: 'No es un correo valido'
                }
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
