var pk = 0;
var personasRegistradas = [];
$(function() {



})

function validar() {
    var nombre, apellido, genero, telefono, usuario, contrasenia, contrasenia2;
    var pw = document.getElementById("form-password").value;
    var pwr = document.getElementById("form-passwordRepeat").value;
    if (document.getElementById("form-firtsname").value == 0) {
        alert("Nombre requerido");
    } else if (document.getElementById("form-lastname").value == 0) {
        alert("Apellido requerido");
    } else if (document.getElementById("form-phone").value == 0) {
        alert("Telefono requerido");
    } else if (document.getElementById("form-user").value == 0) {
        alert("Nombre de usuario requerido");
    } else if (document.getElementById("form-password").value == 0) {
        alert("Contraseña requerida");
    } else if (document.getElementById("form-passwordRepeat").value == 0) {
        alert("Validacion contraseña requerida");
    } else if (document.getElementById("form-passwordRepeat").value == 0) {
        alert("Validacion contraseña requerida");
    } else if (pw == pwr) {
        guardar();
    } else {
        alert("Contraseñas no coinciden");
    }

}



function guardar() {

    var pkey, nombre, apellido, genero, telefono, usuario, contrasenia;
    getContadorPersonasPkeys(pk);
    if (pk == 0) {
        pkey = pk + 1;
    } else {
        pkey = 1;
        pkey += pk;
    }

    nombre = document.getElementById("form-firtsname").value;
    apellido = document.getElementById("form-lastname").value;
    genero = document.getElementById("form-genero").value;
    var sexo;

    if (document.getElementById('hombre').checked) {
        sexo = document.getElementById('hombre').value;

    } else if (document.getElementById('mujer').checked) {
        sexo = document.getElementById('mujer').value;
    }

    telefono = document.getElementById("form-phone").value;
    usuario = document.getElementById("form-user").value;
    contrasenia = document.getElementById("form-password").value;

    var persona = {
        pkG: pkey,
        nombreG: nombre,
        apellidoG: apellido,
        generoG: sexo,
        telefonoG: telefono,
        usuarioG: usuario,
        contraseniaG: contrasenia
    }
    
    localStorageIds(pkey);
    getPersonasRegistradas();
    personasRegistradas.push(persona);
    listPersonasRegistradas(personasRegistradas);
    //localStorage.clear();
}

function listPersonasRegistradas(pList) {
    localStorage.setItem('storagePersonasRegistradas', JSON.stringify(pList))
    alert("Registro exitoso");
}



function localStorageIds(primaryKeysContador) {
    localStorage.setItem('primaryKeysPersonas', JSON.stringify(primaryKeysContador))

}


function getContadorPersonasPkeys() {
    var contadorPkeys = localStorage.getItem('primaryKeysPersonas')
    if (contadorPkeys == null) {
        pk = 0;
    } else {
        pk = JSON.parse(contadorPkeys);

    }
    return contadorPkeys;
}

function getPersonasRegistradas() {
    var storagePersonas = localStorage.getItem('storagePersonasRegistradas')
    if (storagePersonas == null) {
        personasRegistradas = [];
    } else {
        personasRegistradas = JSON.parse(storagePersonas);

    }
    return storagePersonas;
}