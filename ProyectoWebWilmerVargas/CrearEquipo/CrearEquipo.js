var equiposRegistrados = [];
var teamExiste = "";

var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};


function validar() {
    var nombreTeam, categoria, provincia, canton, genero, contrasenia;
    var pw = document.getElementById("form-passwordTeam").value;
    var pwr = document.getElementById("form-passwordTeamRepeat").value;
    var teamName = document.getElementById("form-teamName").value;
    if (document.getElementById("form-teamName").value == 0) {
        alert("Nombre requerido");
    } else if (document.getElementById("form-passwordTeam").value == 0) {
        alert("Contraseña requerida");
    } else if (document.getElementById("form-passwordTeamRepeat").value == 0) {
        alert("Validacion contraseña requerida");
    } else if (verificarTeamName(teamName) == 's') {
        alert("El nombre de equipo ya existe !!");
    } else if (pw == pwr) {
        guardarTeam();
    } else {
        alert("Contraseñas no coinciden");
    }

}


function guardarTeam() {

    var nombreTeam, categoria, provincia, /*canton,*/ genero, contrasenia;

    usuarioLogueado = traerUsuarioLogueado();
    nombreTeam = document.getElementById("form-teamName").value;
    categoria = document.getElementById("combobox").value;
    //provincia = document.getElementById("form-provincia").value;
    provincia = document.getElementById("combobox1").value;

    categoria = document.getElementById("combobox").value;
    //canton = 
    var sexo;
    if (document.getElementById('hombre').checked) {
        sexo = document.getElementById('hombre').value;

    } else if (document.getElementById('mujer').checked) {
        sexo = document.getElementById('mujer').value;
    }



    contrasenia = document.getElementById("form-passwordTeam").value;

    var equipo = {
        capitan: usuarioLogueado.usuarioG,
        jugador2: "",
        jugador3: "",
        jugador4: "",
        jugador5: "",
        nombreTeamG: nombreTeam,
        categoriaG: categoria,
        /*cantoG: canton,*/
        provinciaG: provincia,
        generoG: sexo,
        contraseniaG: contrasenia,

    }
    document.getElementById("form-teamName").value = "";
    document.getElementById("form-passwordTeam").value = "";
    document.getElementById("form-passwordTeamRepeat").value = "";

    getEquiposRegistrados();
    equiposRegistrados.push(equipo);
    listEquiposRegistrados(equiposRegistrados);
    
    
    //localStorage.clear();
}


function listEquiposRegistrados(pList) {
    localStorage.setItem('equiposRegistrados', JSON.stringify(pList))
    alert("Registro exitoso");
    
}




function getEquiposRegistrados() {
    var storageEquipos = localStorage.getItem('equiposRegistrados')
    if (storageEquipos == null) {
        equiposRegistrados = [];
    } else {
        equiposRegistrados = JSON.parse(storageEquipos);

    }

    return equiposRegistrados;
}

function verificarTeamName(teamName) {
    var team = teamName;
    var existe = 'n';

    var lista = getEquiposRegistrados();

    for (var i = 0; i < lista.length; i++) {

        var equipoName = lista[i].nombreTeamG;

        if (equipoName == team) {
            existe = 's';
            return existe;
        } else {
            existe = 'n';
        }
    }
    return existe;
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
asignarNombreLabel();