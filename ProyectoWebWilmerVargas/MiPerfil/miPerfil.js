var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};

traerUsuarioLogueado();
asignarDatosUsuario();

function traerUsuarioLogueado() {
    var usuarioCascaron = localStorage.getItem('personaLogueada')
    if (usuarioCascaron == null) {
        alert("contacta a un administrador");
    } else {
        usuarioLogueado = JSON.parse(localStorage.getItem("personaLogueada"));

    }
    return usuarioLogueado;
}



function asignarDatosUsuario(){
    var labelNombre = document.getElementById("usuario");
    var inputNombre = document.getElementById("form-firtsname");
    var inputApellido = document.getElementById("form-lastname");
    var inputTelefono = document.getElementById("form-phone");
    var inputUsuario = document.getElementById("form-username");
    var inputContrasenia = document.getElementById("form-password").value;
    var inputContraseniaRepeat = document.getElementById("form-passwordRepeat").value;
    var usuario = traerUsuarioLogueado();
    labelNombre.innerText = usuario.nombreG;
    inputNombre.value = usuario.nombreG;
    inputApellido.value = usuario.apellidoG;
    inputTelefono.value = usuario.apellidoG;
    inputTelefono.value = usuario.telefonoG;
    inputUsuario.value = usuario.usuarioG;
    inputContrasenia;
    inputContraseniaRepeat;
    
}
function guardarCambiosUsuario() {

    var pkey, nombre, apellido, genero, telefono, usuario, contrasenia;
    

    nombre = document.getElementById("form-firtsname").value;
    apellido = document.getElementById("form-lastname").value;
    telefono = document.getElementById("form-phone").value;
    usuario = document.getElementById("form-user").value;
    contrasenia = document.getElementById("form-password").value;

    var persona = {
        pkG: pkey,
        nombreG: nombre,
        apellidoG: apellido,
        telefonoG: telefono,
        usuarioG: usuario,
        contraseniaG: contrasenia
    }


    //getPersonasRegistradas();
    //personasRegistradas.push(persona);
    //listPersonasRegistradas(personasRegistradas);
    //localStorage.clear();
}

function validar(){
    var nombre, apellido, genero, telefono, usuario, contrasenia, contrasenia2;
    var pw = document.getElementById("form-password").value;
    var pwr = document.getElementById("form-passwordRepeat").value;
    var usuario = document.getElementById("form-user").value;
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
    } else if (verificarUsuarioName(usuario) == 's') {
        alert("El nombre de usuario ya existe !!");
    } else if (pw == pwr) {
        guardarCambiosUsuario();
    } else {
        alert("Contraseñas no coinciden");
    }

}

function verificarUsuarioName(userName) {
    var user = userName;
    var existe = 'n';

    var lista = getPersonasRegistradas();

    for (var i = 0; i < lista.length; i++) {

        var nick = lista[i].usuarioG;

        if (nick == user) {
            existe = 's';
            return existe;
        } else {
            existe = 'n';
        }
    }
    return existe;
}
