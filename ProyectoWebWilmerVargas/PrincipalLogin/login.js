var personasRegistradas = [];
$(function() {



})

function validar() {
    var nombre, apellido, genero, telefono, usuario, contrasenia, contrasenia2;
    var pw = document.getElementById("form-password").value;
    var usuario = document.getElementById("form-username").value;
    if (document.getElementById("form-username").value == 0) {
        alert("Nombre requerido");
    } else if (document.getElementById("form-password").value == 0) {
        alert("Contraseña requerida");
    } else if (verificacionLogin(usuario, pw) == 'n') {
        alert("El nombre de usuario o contraseña son incorrectos")
    } else {
        window.open("../MenuPrincipal/GrandChallengeMenuPrincipal.html")
    }

}

function getPersonasRegistradas() {
    var storagePersonas = localStorage.getItem('storagePersonasRegistradas')
    if (storagePersonas == null) {
        personasRegistradas = [];
    } else {
        personasRegistradas = JSON.parse(storagePersonas);

    }

    return personasRegistradas;
}

function verificacionLogin(userName, pw) {
    var user = userName;
    var pw = pw;
    var existe = 'n';

    var lista = getPersonasRegistradas();

    for (var i = 0; i < lista.length; i++) {

        var nick = lista[i].usuarioG;
        var passw = lista[i].contraseniaG;
        if (nick == user && passw == pw) {
            existe = 's';
            return existe;
        } else {
            existe = 'n';
        }
    }
    return existe;
}