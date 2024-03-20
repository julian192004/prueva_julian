// Expresiones regulares para validar campos
const expresiones = {
    documento: /^[0-9]{7,10}$/, // Documento de identidad entre 7 y 10 dígitos
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos
    especialidad: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos
    telefono: /^\d{7,14}$/ // 7 a 14 números.
}

// Campos del formulario
const campos = {
    documento: false,
    nombre: false,
    especialidad: false,
    telefono: false
}

// Función para validar un campo
const validarCampo = (expresion, input, campo) => {
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
    }
}

// Función para validar el formulario
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "documento":
            validarCampo(expresiones.documento, e.target, 'documento');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "especialidad":
            validarCampo(expresiones.especialidad, e.target, 'especialidad');
            break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
    }
}

// Obtener todos los inputs del formulario
const inputs = document.querySelectorAll('.formulario__input');

// Asignar eventos de validación a los inputs
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

// Función para validar el formulario antes de enviarlo
document.getElementById('formulario').addEventListener('submit', (e) => {
    e.preventDefault(); // Evitar que se envíe el formulario automáticamente

    // Verificar que todos los campos estén completados correctamente
    if(campos.documento && campos.nombre && campos.especialidad && campos.telefono){
        // Si todos los campos son válidos, enviar el formulario
        e.target.submit();
    } else {
        // Si algún campo no es válido, mostrar un mensaje de error
        alert('Por favor completa correctamente todos los campos del formulario.');
    }
});
