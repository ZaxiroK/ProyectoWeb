var canchasRegistradas = [];
var canchaNoExistente = "";
var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};
asignarNombreLabel();

function validar() {
    var nombre, nombreDelEncargado, telefonoCancha, celular, usuarioQueRegistroCancha;
    //var pw = document.getElementById("form-password").value;
    //var pwr = document.getElementById("form-passwordRepeat").value;
    var cancha = document.getElementById("form-canchaName").value;
    if (document.getElementById("form-canchaName").value == 0) {
        alert("Nombre de la cancha requerido");
    } else if (document.getElementById("form-boss").value == 0) {
        alert("Nombre del encargado requerido");
    } else if (document.getElementById("form-phone").value == 0) {
        alert("Telefono requerido");
    } else if (document.getElementById("form-cellphone").value == 0) {
        alert("Celular requerido");
    } else if (verificarCanchaName(cancha) == 's') {
        alert("El nombre de la cancha ya existe !!!");
    } else {
        guardarCancha();
    }

}

function verificarCanchaName(cancha) {
    var canchaFutName = cancha;
    var existe = 'n';

    var lista = getCanchasRegistradas();

    for (var i = 0; i < lista.length; i++) {

        var name = lista[i].canchaG;

        if (name == canchaFutName) {
            existe = 's';
            return existe;
        } else {
            existe = 'n';
        }
    }
    return existe;
}

function getCanchasRegistradas() {
    var canchasGuardadas = localStorage.getItem('canchasRegistradas')
    if (canchasGuardadas == null) {
        canchasRegistradas = [];
    } else {
        canchasRegistradas = JSON.parse(canchasGuardadas);

    }

    return canchasRegistradas;
}

function guardarCancha() {

    var nombreCancha, categoria, provincia, nombreDelEncargado, telefonoCancha, celular, usuarioQueRegistroCancha;


    nombreCancha = document.getElementById("form-canchaName").value;
    categoria = document.getElementById("combobox").value;
    provincia = document.getElementById("combobox1").value;
    nombreDelEncargado = document.getElementById("form-boss").value;
    telefonoCancha = document.getElementById("form-phone").value;
    celular = document.getElementById("form-cellphone").value;
    usuarioQueRegistroCancha = usuarioLogueado.nombreG;
    var cancha = {
        nombreCanchaG: nombreCancha,
        categoriaG: categoria,
        provinciaG: provincia,
        nombreDelEncargadoG: nombreDelEncargado,
        telefonoCanchaG: telefonoCancha,
        celularG: celular,
        usuarioQueRegistroCanchaG: usuarioQueRegistroCancha
    }

    getCanchasRegistradas();
    canchasRegistradas.push(cancha);
    localStorageCanchasRegistradas(canchasRegistradas);
    //localStorage.clear();
}

function localStorageCanchasRegistradas(cancha) {
    localStorage.setItem('canchasRegistradas', JSON.stringify(cancha))
    alert("Registro exitoso");
}

function traerUsuarioLogueado() {
    var usuarioCascaron = localStorage.getItem('personaLogueada')
    if (usuarioCascaron == null) {
        alert("contacta a un administrador");
    } else {
        usuarioLogueado = JSON.parse(localStorage.getItem("personaLogueada"));

    }
    return usuarioLogueado;
}

function asignarNombreLabel() {
    var label = document.getElementById("usuario");
    var usuario = traerUsuarioLogueado();
    console.log(usuario.nombreG);
    label.innerText = usuario.nombreG;
}