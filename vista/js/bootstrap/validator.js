//INICIO VALIDADORES TP 1
$('#num').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        numero: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        }
    }
});

$('#horas').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        lunes: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        },
        martes: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        },
        miercoles: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        },
        jueves: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        },
        viernes: {
            message : 'Ingrese un número',
            validators: {
                notEmpty: {}
            }
        }
    }
});

$('#datapers').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nombre: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un nombre'
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        apellido: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un nombre'
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        edad: {
            message: 'Debe ingresar una edad válida',
            validators: {
                notEmpty: {},
                digits: {},
                greaterThan: {
                    value: 7,
                    message: "No puede ser menor a 7"
                },
                lessThan: {
                    value: 100,
                    message: "No puede superar 99"
                }
            }
        },
        direccion: {
            message : 'Debe ingresar una dirección',
            validators: {
                notEmpty: {},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        genero: {
            message: 'Debe seleccionar un género',
            validators: {
                notEmpty: {}
            }
        },
        estudios: {
            message: 'Debe seleccionar un nivel',
            validators: {
                notEmpty: {}
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#operacion').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        fi: {
            message : 'Debe ingresar un numero',
            validators: {
                notEmpty: {}
            }
        },
        se: {
            message : 'Debe ingresar un numero',
            validators: {
                notEmpty: {}
            }
        },
        op: {
            message: 'Debe seleccionar una operación',
            validators: {
                notEmpty: {}
            }
        }
    }
});

$('#datos').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nombre: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un nombre'
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        apellido: {
            validators: {
                notEmpty: {
                    message : 'Debe ingresar un nombre'
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        edad: {
            message: 'Debe ingresar una edad válida',
            validators: {
                notEmpty: {},
                greaterThan: {
                    value: -1
                },
            }
        },
        direccion: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar una dirección'
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        estudiante: {
            message: 'Debe seleccionar una opción',
            validators: {
                notEmpty: {}
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});
//FIN VALIDADORES TP 1

//INICIO VALIDADORES TP2
$('#login').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        user: {
            message : 'Debe ingresar un usuario',
            validators: {
                notEmpty: {}
            }
        },
        pass: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar una contraseña'
                },
                stringLength: {
                    min: 8,
                    message: 'La contraseña debe tener al menos 8 caracteres'
                },
                different: {
                    field: 'user',
                    message: 'El usuario y la contraseña no pueden ser iguales'
                },
                regexp: {
                    regexp: /^[a-zA-Z0-9]+$/,
                    message: 'La contraseña solo puede tener letras y numeros'
                },
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#cinemas').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        titulo: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar un titulo'
                }
            }
        },
        actores: {
            validators: {
                notEmpty: {
                    message: 'Debe ingresar al menos un nombre'
                },
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Debe ingresar nombres y apellidos separados por coma'
                }
            }
        },
        director: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar al menos un nombre'
                },
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Se detectan caracteres inválidos'
                }
            }
        },
        guion: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar al menos un nombre'
                },
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Se detectan caracteres inválidos'
                }
            }
        },
        produccion: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar al menos un productor',
                },
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Se detectan caracteres inválidos'
                }
            }
        },
        anio: {
            message: 'Ingrese un número válido',
            validators:{
                notEmpty:{
                    message: 'Debe ingresar un año',
                },
                digits:{
                    message: 'Solo números'
                },
                greaterThan: {
                    value: 1895,
                    message: "No puede ser menor a 1895"
                },
                lessThan: {
                    value: 2021,
                    message: "No puede superar 2021"
                }
            }
        },
        nacionalidad: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar una nacionalidad',
                },
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres inválidos'
                }
            }
        },
        genero: {
            validators:{
                notEmpty:{
                    message: 'Debe seleccionar un género',
                }
            }
        },
        duracion: {
            validators:{
                notEmpty:{
                    message: 'Debe ingresar la duración en minutos',
                },
                digits:{
                    message: 'Solo números'
                },
                greaterThan: {
                    value: 1,
                    message: "No puede ser menor a 1"
                },
                lessThan: {
                    value: 999,
                    message: "No puede superar 999"
                }
            }
        },
        restriccion: {
            validators:{
                notEmpty:{
                    message: 'Debe seleccionar una restricción de edad'
                }
            }
        },
        archivo: {
            validators: {
                notEmpty:{
                    message: 'Debe subir un archivo'
                }
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

//Validacion TP4
$('#buscarAuto').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        patente: {
            validators: {
                notEmpty: {
                    message : 'Ingrese una patente',
                },
                stringLength: {
                    max: 7,
                    message:'Máxino de 7 caracteres',
                },
                regexp: {
                    regexp: /[A-Z]{3} [\d]{3}/,
                    message: 'Se deben respetar los formatos "AAA 000"',
                }   
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#buscarPersona').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nroDni: {
            validators: {
                notEmpty: {
                    message : 'Ingrese un DNI',
                },
                stringLength: {
                    min: 8,
                    max:8,
                    message: 'El DNI debe contar con 8 dígitos'
                },
                digits:{
                    message: 'Solo se aceptan números'
                },
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#nuevaPersona').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nroDni: {
            validators: {
                notEmpty: {
                    message : 'Ingrese un DNI'},
                stringLength: {
                    min: 8,
                    max:8,
                    message: 'El DNI debe contar con 8 dígitos'},
                digits:{
                    message: 'Solo se aceptan números'},
            }
        },
        nombre:{
            validators:{
                notEmpty:{
                    message:'Ingrese un nombre'},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        apellido:{
            validators:{
                notEmpty:{
                    message:'Ingrese un apellido'},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        telefono:{
            validators:{
                notEmpty:{
                    message:'Ingrese un telefono'},
                digits: {
                    message: 'Solo se admiten números'}
            }
        },
        domicilio: {
            validators: {
                notEmpty: {message : 'Debe ingresar una dirección',},
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        fechaNac:{
            validators:{
                notEmpty:{message:'Ingrese una fecha valida'}
            }
        }

    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#nuevoAuto').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        patente: {
            validators: {
                notEmpty: {
                    message : 'Ingrese una patente',
                },
                stringLength: {
                    max: 7,
                    message:'Máxino de 7 caracteres',
                },
                regexp: {
                    regexp: /[A-Z]{3} [\d]{3}/,
                    message: 'Se deben respetar los formatos "AAA 000"',
                }   
            }
        },
        marca: {
            validators: {
                notEmpty: {message : 'Ingrese una marca'},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Solo se permiten letras'
                }
            }
        },
        modelo: {
            validators: {
                notEmpty: {message : 'Ingrese modelo'},
                digits:{
                    message: 'Solo números'
                },
                greaterThan: {
                    value: 1895,
                    message: "No puede ser menor a 1895"
                },
                lessThan: {
                    value: 2021,
                    message: "No puede superar 2021"
                }
            }
        },
        dniDuenio: {
            validators: {
                notEmpty: {
                    message : 'Ingrese un DNI'},
                stringLength: {
                    min: 8,
                    max:8,
                    message: 'El DNI debe contar con 8 dígitos'},
                digits:{
                    message: 'Solo se aceptan números'},
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

$('#cambioDuenio').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nroDni: {
            validators: {
                notEmpty: {
                    message : 'Ingrese un DNI',
                },
                stringLength: {
                    min: 8,
                    max:8,
                    message: 'El DNI debe contar con 8 dígitos'
                },
                digits:{
                    message: 'Solo se aceptan números'
                },
            }
        },
        patente: {
            validators: {
                notEmpty: {
                    message : 'Ingrese una patente',
                },
                stringLength: {
                    max: 7,
                    message:'Máxino de 7 caracteres',
                },
                regexp: {
                    regexp: /[A-Z]{3} [\d]{3}/,
                    message: 'Se deben respetar los formatos "AAA 000"',

                }
                 
            }
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});

$('#buscarPersonaAc').bootstrapValidator({
    message: 'Este valor no es valido',
    feedbackIcons: {
        valid: 'fa fa-check',
        invalid: 'fa fa-exclamation',
        validating: 'fa fa-circle'
    },
    fields: {
        nombre:{
            validators:{
                notEmpty:{
                    message:'Ingrese un nombre'},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        apellido:{
            validators:{
                notEmpty:{
                    message:'Ingrese un apellido'},
                regexp: {
                    regexp: /^[A-Za-zñáéíóúÑÁÉÍÓÚüÜ ]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        telefono:{
            validators:{
                notEmpty:{
                    message:'Ingrese un telefono'},
                digits: {
                    message: 'Solo se admiten números'}
            }
        },
        domicilio: {
            validators: {
                notEmpty: {message : 'Debe ingresar una dirección',},
                regexp: {
                    regexp: /^[0-9A-Za-zñáéíóúÑÁÉÍÓÚüÜ '\-,]+$/,
                    message: 'Se detectan caracteres invalidos'
                }
            }
        },
        fechaNac:{
            validators:{
                notEmpty:{message:'Ingrese una fecha'},
                regexp: {
                    regexp: /^\d{4}[\-\/\s]?((((0[13578])|(1[02]))[\-\/\s]?(([0-2][0-9])|(3[01])))|(((0[469])|(11))[\-\/\s]?(([0-2][0-9])|(30)))|(02[\-\/\s]?[0-2][0-9]))$/,
                    message: 'Ingrese una fecha valida <br> Respetar el formato yyyy-mm-dd'
                }
            },
                        
        }
    }
})
.on('error.validator.bv', function(e, data) {
    data.element
        .data('bv.messages')
        .find('.help-block[data-bv-for="' + data.field + '"]').hide()
        .filter('[data-bv-validator="' + data.validator + '"]').show();
});