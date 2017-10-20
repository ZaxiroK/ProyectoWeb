var contadorCombobox = 0;
var equiposRegistrados = [];
var retosRegistrados = [];
var equiposRegistrados = [];
var matchesRegistrados = [];
var contador;
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
    for (var i = 0; i < listaEquipos.length; i++) {
        if (listaEquipos[i].capitan == usuarioLogueado.usuarioG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador2 == usuarioLogueado.usuarioG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador3 == usuarioLogueado.usuarioG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;
        } else if (listaEquipos[i].jugador4 == usuarioLogueado.usuarioG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;

        } else if (listaEquipos[i].jugador5 == usuarioLogueado.usuarioG) {
            equipoLogueado = listaEquipos[i];
            return equipoLogueado;

        }

    }
}



function traerEquipoDelJugadorXparametros(jugador) {
    var listaEquipos = getEquiposRegistrados();
    var player = jugador;
    var equipo2;
    for (var i = 0; i < listaEquipos.length; i++) {
        if (listaEquipos[i].capitan == jugador) {
            equipo2 = listaEquipos[i];
            return equipo2;
        } else if (listaEquipos[i].jugador2 == jugador) {
            equipo2 = listaEquipos[i];
            return equipo2;
        } else if (listaEquipos[i].jugador3 == jugador) {
            equipo2 = listaEquipos[i];
            return equipo2;
        } else if (listaEquipos[i].jugador4 == jugador) {
            equipo2 = listaEquipos[i];
            return equipo2;

        } else if (listaEquipos[i].jugador5 == jugador) {
            equipo2 = listaEquipos[i];
            return equipo2;

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


function aceptarMatches(match) {
    localStorage.setItem('matchesAceptadosRegistrados', JSON.stringify(match))
    alert("Solicitud de match aceptada ");

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


function getMatchesRegistrados() {
    var storageMatches = localStorage.getItem('matchesRegistrados')
    if (storageMatches == null) {
        matchesRegistrados = [];
    } else {
        matchesRegistrados = JSON.parse(storageMatches);

    }

    return matchesRegistrados;
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
    label.innerText = usuario.nombreG;
}



function cargarMisRetosCreados() {
    var retos = [];
    var btn = "s";
    var retoAcargar = misMatches();
    
        
        gridBody = document.querySelector("#tblMisRetos tbody");

    if (retoAcargar != null) {
        
   

    gridBody.innerHTML = '';

    retoAcargar.forEach(function(x, contador) {
        var tr = document.createElement("tr"),
            tdNumero = document.createElement("td"),
            tdID = document.createElement("td"),
            tdEquipo = document.createElement("td"),
            tdUsuario = document.createElement("td"),
            tdTelefono = document.createElement("td"),
            tdCancha = document.createElement("td"),
            tdFecha = document.createElement("td"),
            tdHora = document.createElement("td");
            /*if(validarBtnAcceptarReto(x.encargadoG) =="n"){
                btn = "n"
            }*/
        
            var tdEliminar = document.createElement("td"),
            btnEliminar = document.createElement("button");
        
            /*if(btn =="n"){
            var tdAceptar = document.createElement("td"),
            btnAceptar = document.createElement("button");
            }*/

        tdNumero.innerHTML = contador + 1;
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
                        removeFromLocalStorage(x.IDG);
                    });
                




            });

        });
        
        
        /*if(btn =="n"){
 
        btnAceptar.className = 'delete btn btn-success btn-sm glyphicon glyphicon-ok';
        btnAceptar.addEventListener('click', function() {
            $(document).ready(function() {
                  
                    $('#delete').modal('show');

                    $("#del").click(function() {
                        
                    });
                




            });

        });
        }
        */

        
        tdEliminar.appendChild(btnEliminar);
        /*if(btn =="n"){
        tdAceptar.appendChild(btnAceptar);
        }*/
        tr.appendChild(tdNumero);
        tr.appendChild(tdID);
        tr.appendChild(tdEquipo);
        tr.appendChild(tdUsuario);
        tr.appendChild(tdTelefono);
        tr.appendChild(tdCancha);
        tr.appendChild(tdFecha);
        tr.appendChild(tdHora);
        tr.appendChild(tdEliminar);
        if(btn =="n"){
        //tr.appendChild(tdAceptar);
        }


        gridBody.appendChild(tr);
    });
 }
}



        

function misMatches(){
    var equipo1 = equipoLogueado;
    var equipo2;
    var matchesExiste = getMatchesRegistrados();
    var contenedorMatches = [];
    var contenedorMatches2 = [];
    var listaMisRetos = [];
    var equipo1Guardado;
    var equipo2Guardado;
    //var retoGuardado;
    var IDG;
    
    for (var i = 0; i < matchesExiste.length; i++) {
        contenedorMatches = matchesExiste[i];
        IDG = i;
        for (var y = 0; y < contenedorMatches.length; y++) {
            contenedorMatches2 = contenedorMatches[y];
            
            if (equipo1Guardado == null) {
                equipo1Guardado = contenedorMatches2;

            } else if (equipo2Guardado == null){
                equipo2Guardado = contenedorMatches2;
            } else {
                var retoGuardado = {
                    IDG : i,
                    nombreTeamG : contenedorMatches2.nombreTeamG,
                    encargadoG : contenedorMatches2.encargadoG,
                    telefonoG : contenedorMatches2.telefonoG,
                    canchaG : contenedorMatches2.canchaG,
                    fechaG : contenedorMatches2.fechaG,
                    horaG : contenedorMatches2.horaG
                }  
            }
            }


       

        if (equipo1Guardado.nombreTeamG == equipo1.nombreTeamG  ||
            equipo2Guardado.nombreTeamG == equipo1.nombreTeamG ) {
            if(equipoLogueado.nombreTeamG == equipo1Guardado.nombreTeamG){
                
            listaMisRetos.push(retoGuardado);
                contador++;
        } else {
             listaMisRetos.push(retoGuardado);
             contador++;
        }
            }
         } return listaMisRetos;
    } 

function validarBtnAcceptarReto(encargado){
    var persona = encargado;
    var resultado = 'n';
    if(persona == equipoLogueado.capitan ){
        resultado = 's';
    }else if (persona == equipoLogueado.jugador2) {
                resultado = 's'; 
    }else if (persona == equipoLogueado.jugador3) {
                resultado = 's'; 
    }else if (persona == equipoLogueado.jugador4) {
                resultado = 's'; 
    }else if (persona == equipoLogueado.jugador5) {
                resultado = 's'; 
    } return resultado;
           
}

function removeFromLocalStorage(index) {
    var misRetos = [],
        dataInLocalStorage = localStorage.getItem("matchesRegistrados");

    misRetos = JSON.parse(dataInLocalStorage);

    misRetos.splice(index, 1);

    localStorage.setItem("matchesRegistrados", JSON.stringify(misRetos));

    cargarMisRetosCreados();
}


