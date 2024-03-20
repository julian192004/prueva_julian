const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    doc: /^\d{6,11}$/, // Documento de 6 a 11 dígitos
    nom: /^[a-zA-ZÀ-ÿ\s]{12,40}$/, // Nombre de 12 a 40 caracteres
    telefono: /^[0-9]{10,12}$/ // Teléfono de 10 a 12 dígitos
}

const campos = {
    doc: false,
    nom: false,
    telefono: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "doc":
            validarCampo(expresiones.doc, e.target, 'doc');
            break;
        case "nom":
            validarCampo(expresiones.nom, e.target, 'nom');
            break;
        case "telefono":
            validarCampo(expresiones.telefono, e.target, 'telefono');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        campos[campo] = true;
    } else {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        campos[campo] = false;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    const terminos = document.getElementById('terminos');
    if (campos.doc && campos.nom && campos.telefono && terminos.checked) {
        formulario.submit();
        formulario.reset();
    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});
