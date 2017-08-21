var contadorCombobox = 0;
var equiposRegistrados = [];
var retosRegistrados = [];
var equiposRegistrados = [];
var equipoLogueado = {
    capitan: "",
    jugador2: "",
    jugador3: "",
    jugador4: "",
    jugador5: "",
    nombreTeamG: "",
    categoriaG: "",
    provinciaG: "",
    generoG: "",

}
var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};

FillCombo();
traerUsuarioLogueado();
traerEquipoDelJugador();
asignarNombreLabel();
cargarMisRetosCreados();

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

function FillCombo() {
    var comboProvincia = document.getElementById("combobox1").value;

    var canchas = [],
        listaCanchas = localStorage.getItem("canchasRegistradas")
    if (listaCanchas !== null) {
        canchas = JSON.parse(listaCanchas);
    }
    var combo = document.getElementById("comboboxCanchas");

    /* if(contadorCombobox > 0){
               for (var i = 0; i < combo.length; i++) {
                    for (var i = 0; i < canchas.length; i++) {
                 combo = document.getElementById("comboboxCanchas");
                    var option = document.createElement('option');
           combo.options.add(option, i);
           combo.options[i].value = canchas[i].nombreCanchaG;
           combo.options[i].innerText = canchas[i].nombreCanchaG;
                    contadorCombobox++;
          
                } 
 
       }
    }else{*/
    for (var i = 0; i < canchas.length; i++) {
        //if(canchas[i].provinciaG == comboProvincia ){

        combo = document.getElementById("comboboxCanchas");
        var option = document.createElement('option');
        combo.options.add(option, i);
        combo.options[i].value = canchas[i].nombreCanchaG;
        combo.options[i].innerText = canchas[i].nombreCanchaG;
        contadorCombobox++;

        // }
    }
}

function cargarMisRetosCreados() {
    var retos = [];
    var globalRetos = [],
        dataInLocalStorage = localStorage.getItem("retosRegistrados"),
        gridBody = document.querySelector("#tblMisRetos tbody");

    if (dataInLocalStorage !== null) {
        globalRetos = JSON.parse(dataInLocalStorage);
    }

    for (var i = 0; i < globalRetos.length; i++) {
        if (equipoLogueado.nombreTeamG != globalRetos[i].nombreTeamG) {
            var retoGuardado = globalRetos[i];

            retos.push(retoGuardado);

        }
    }
    gridBody.innerHTML = '';

    retos.forEach(function(x, i) {
        var tr = document.createElement("tr"),
            tdNumero = document.createElement("td"),
            tdEquipo = document.createElement("td"),
            tdUsuario = document.createElement("td"),
            tdTelefono = document.createElement("td"),
            tdCancha = document.createElement("td"),
            tdFecha = document.createElement("td"),
            tdHora = document.createElement("td"),
            tdInformacion = document.createElement("td"),
            btnInformacion = document.createElement("button");

        tdNumero.innerHTML = i + 1;
        tdEquipo.innerHTML = x.equipoG;
        tdUsuario.innerHTML = x.encargadoG;
        tdTelefono.innerHTML = x.telefonoG;
        tdCancha.innerHTML = x.canchaG;
        tdFecha.innerHTML = x.fechaG;
        tdHora.innerHTML = x.horaG;


        btnInformacion.className = 'delete btn btn-success btn-sm glyphicon glyphicon-search';
        btnInformacion.addEventListener('click', function() {
            $(document).ready(function() {
                $('#delete').modal('show');

                $("#del").click(function() {
                    removeFromLocalStorage(i);
                });
            });

        });


        tdInformacion.appendChild(btnInformacion);

        tr.appendChild(tdNumero);
        tr.appendChild(tdEquipo);
        tr.appendChild(tdUsuario);
        tr.appendChild(tdTelefono);
        tr.appendChild(tdCancha);
        tr.appendChild(tdFecha);
        tr.appendChild(tdHora);
        tr.appendChild(tdInformacion);


        gridBody.appendChild(tr);
    });

}
