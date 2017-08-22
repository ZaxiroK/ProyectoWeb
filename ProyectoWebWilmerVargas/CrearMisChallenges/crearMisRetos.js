var contadorCombobox = 0;
var localStorageKeyName = 'canchasRegistradas';
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
    generoG: ""

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



//loadFromLocalStorage();
FillCombo();
traerUsuarioLogueado();
traerEquipoDelJugador();
asignarNombreLabel();
cargarMisRetosCreados();

function traerUsuarioLogueado() {
    var usuarioCascaron = localStorage.getItem('personaLogueada')
    if (usuarioCascaron == null) {
        alert("contacta a un administrador");
    } else {
        usuarioLogueado = JSON.parse(localStorage.getItem("personaLogueada"));

    }
    return usuarioLogueado;
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

function asignarNombreLabel() {
    var label = document.getElementById("usuario");
    var usuario = traerUsuarioLogueado();
    console.log(usuario.nombreG);
    label.innerText = usuario.nombreG;
}



function validar() {

    var fecha = document.getElementById("fecha").value;
    var hora = document.getElementById("hora").value;

    if (document.getElementById("fecha").value == 0) {
        alert("Fecha requerida");
    } else if (document.getElementById("hora").value == 0) {
        alert("Hora requerida");
    } else {
        btnEnviarChallenge();
    }

}

function listRetos(pList) {
    localStorage.setItem('retosRegistrados', JSON.stringify(pList))
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

function getRetosRegistrados() {
    var listRetos = localStorage.getItem('retosRegistrados')
    if (listRetos == null) {
        retosRegistrados = [];
    } else {
        retosRegistrados = JSON.parse(listRetos);

    }

    return retosRegistrados;
}

function btnEnviarChallenge() {
    var usuario, capitan, telefono, nombreTeam, sexo, provincia, categoria, cancha, fecha, hora;

    usuarioLogueado = traerUsuarioLogueado();
    equipoLogueado = traerEquipoDelJugador();

    usuario = usuarioLogueado.nombreG;
    capitan = equipoLogueado.capitan;
    telefono = usuarioLogueado.telefonoG;
    nombreTeam = equipoLogueado.nombreTeamG;
    sexo = equipoLogueado.generoG;
    provincia = document.getElementById("combobox1").value;
    cancha = document.getElementById("comboboxCanchas").value;
    categoria = document.getElementById("comboboxCanchas").value;
    fecha = document.getElementById("fecha").value;
    hora = document.getElementById("hora").value;

    var equipo = {
        encargadoG: usuario,
        capitanG: capitan,
        telefonoG: telefono,
        equipoG: nombreTeam,
        sexoG: sexo,
        provinciaG: provincia,
        canchaG: cancha,
        nombreTeamG: nombreTeam,
        categoriaG: categoria,
        fechaG: fecha,
        horaG: hora

    }


    getRetosRegistrados();
    retosRegistrados.push(equipo);
    listRetos(retosRegistrados);


    //localStorage.clear();

}

function FillCombo() {
    var comboProvincia = document.getElementById("combobox1").value;

    var canchas = [],
        listaCanchas = localStorage.getItem(localStorageKeyName)
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




function getCanchasGuardadas(obj) {
    var canchas = [],
        listaCanchas = localStorage.getItem(localStorageKeyName);

    if (listaCanchas !== null) {
        canchas = JSON.parse(listaCanchas);
    }
}


function cargarMisRetosCreados() {
    var retos = [];
    //var arregloListaDelete = [];
    var MisRetos = [],
    
        dataInLocalStorage = localStorage.getItem("retosRegistrados"),
        gridBody = document.querySelector("#tblMisRetos tbody");

    if (dataInLocalStorage !== null) {
        MisRetos = JSON.parse(dataInLocalStorage);
    }

    for (var i = 0; i < MisRetos.length; i++) {
        if (equipoLogueado.nombreTeamG == MisRetos[i].nombreTeamG) {
            var retoTabla = {
            IDG : i,
            nombreTeamG : MisRetos[i].nombreTeamG,
            encargadoG : MisRetos[i].encargadoG,
            telefonoG : MisRetos[i].telefonoG,
            canchaG : MisRetos[i].canchaG,
            fechaG : MisRetos[i].fechaG,
            horaG : MisRetos[i].horaG
            
            }
            retos.push(retoTabla);
            //arregloListaDelete.push(i);

        } 
    }
    gridBody.innerHTML = '';

    retos.forEach(function(x, i) {
        var tr = document.createElement("tr"),
            tdNumero = document.createElement("td"),
            tdID = document.createElement("td"),
            tdEquipo = document.createElement("td"),
            tdUsuario = document.createElement("td"),
            tdTelefono = document.createElement("td"),
            tdCancha = document.createElement("td"),
            tdFecha = document.createElement("td"),
            tdHora = document.createElement("td"),
            tdElimnar = document.createElement("td"),
            btnEliminar = document.createElement("button");

        tdNumero.innerHTML = i + 1;
        tdID.innerHTML = x.IDG;
        tdEquipo.innerHTML = x.nombreTeamG;
        tdUsuario.innerHTML = x.encargadoG;
        tdTelefono.innerHTML = x.telefonoG;
        tdCancha.innerHTML = x.canchaG;
        tdFecha.innerHTML = x.fechaG;
        tdHora.innerHTML = x.horaG;


        btnEliminar.className = 'delete btn btn-danger btn-sm glyphicon glyphicon-trash';
        btnEliminar.addEventListener('click', function() {
            $(document).ready(function() {
                $('#delete').modal('show');

                $("#del").click(function() {
                    //for (var i = 0; i < arregloListaDelete.length; i++) {
                    removeFromLocalStorage(x.IDG);
                });
            });

        });


        tdElimnar.appendChild(btnEliminar);

        tr.appendChild(tdNumero);
        tr.appendChild(tdID);
        tr.appendChild(tdEquipo);
        tr.appendChild(tdUsuario);
        tr.appendChild(tdTelefono);
        tr.appendChild(tdCancha);
        tr.appendChild(tdFecha);
        tr.appendChild(tdHora);
        tr.appendChild(tdElimnar);


        gridBody.appendChild(tr);
    });

}




function removeFromLocalStorage(index) {
    var misRetos = [],
        dataInLocalStorage = localStorage.getItem("retosRegistrados");

    misRetos = JSON.parse(dataInLocalStorage);

    misRetos.splice(index, 1);

    localStorage.setItem("retosRegistrados", JSON.stringify(misRetos));

    cargarMisRetosCreados();
}


