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


asignarNombreLabel();
//asignarDatosEquipo();

function validar() {
    var nombreTeam, categoria, provincia, canton, genero, contrasenia;
    var pw = document.getElementById("form-passwordTeam").value;
    var pwr = document.getElementById("form-passwordTeamRepeat").value;
    //var teamName = document.getElementById("form-teamName").value;
    /*if (document.getElementById("form-teamName").value == 0) {
        alert("Nombre requerido");
    } else*/ if (document.getElementById("form-passwordTeam").value == 0) {
        alert("Contraseña requerida");
    } else if (document.getElementById("form-passwordTeamRepeat").value == 0) {
        alert("Validacion contraseña requerida");
    } /*else if (verificarTeamName(teamName) == 's') {
        alert("El nombre de equipo ya existe !!");
    }*/
     else if (pw == pwr) {
        editarEquipo();
    } else {
        alert("Contraseñas no coinciden");
    }

}

function traerEquipoDelJugador() {
    var listaEquipos = getEquiposRegistrados();
    var miEquipo = 'n';
    for (var i = 0; i < listaEquipos.length; i++) {
        if (listaEquipos[i].capitan == usuarioLogueado.nombreG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador2 == usuarioLogueado.nombreG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador3 == usuarioLogueado.nombreG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador4 == usuarioLogueado.nombreG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;

        } else if (listaEquipos[i].jugador5 == usuarioLogueado.nombreG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;

        }

    }
}


function editarEquipo() {
    var confirmacion = 'n';
    for (var i = 0; i < equiposRegistrados.length; i++) {
         if(usuarioLogueado.usuarioG==equiposRegistrados[i].capitan){
            //equiposRegistrados[i].nombreTeamG = document.getElementById("form-teamName").value;
            equiposRegistrados[i].contraseniaG =document.getElementById("form-passwordTeam").value;
            equiposRegistrados[i].provinciaG = document.getElementById("combobox1").value; 

         var equipoChangeDatos = {
                    capitan: equiposRegistrados[i].capitan,
                    jugador2: equiposRegistrados[i].jugador2,
                    jugador3: equiposRegistrados[i].jugador3,
                    jugador4: equiposRegistrados[i].jugador4,
                    jugador5: equiposRegistrados[i].jugador5,
                    nombreTeamG: equiposRegistrados[i].nombreTeamG,
                    categoriaG: equiposRegistrados[i].categoriaG,
                    /*cantoG: canton,*/
                    provinciaG: equiposRegistrados[i].provinciaG,
                    generoG: equiposRegistrados[i].generoG,
                    contraseniaG: equiposRegistrados[i].contraseniaG,

    }
         localStorage.setItem('equiposRegistrados', JSON.stringify(equiposRegistrados));
         alert("Actualizacion Completa");
         confirmacion = 's';  
         equipoLogueado(equipoChangeDatos);
         traerEquipoDelJugador();
         asignarDatosEquipo();
         limpiar();
         //location.href ="../MenuPrincipal/GrandChallengeMenuPrincipal.html";
}
     } if(confirmacion == "n"){
    alert("Solo el capitan puede modificar el equipo")
         }
} 


/*function asignarDatosEquipo(){
    //var labelNombre = document.getElementById("usuario");
    var inputNombre = document.getElementById("form-teamName");
    
    var equipo = traerEquipoDelJugador();
    inputNombre.value = equipo.nombreTeamG;
}*/







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
    var labelusuario = document.getElementById("usuario");
    var labelteam = document.getElementById("nombreEquipo");
    var usuario = traerUsuarioLogueado();
    var nombreEquipo = traerEquipoDelJugador();
    
     labelusuario.innerText = usuario.nombreG;
    if(nombreEquipo != null){
    labelteam.innerText = nombreEquipo.nombreTeamG;
        }
}

