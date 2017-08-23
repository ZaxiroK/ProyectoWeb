var contadorCampos = 0;

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
traerUsuarioLogueado();
traerEquipoDelJugador();
getEquiposRegistrados();
var equiposRegistrados = getEquiposRegistrados();
cargarMiEquipo();

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

function getEquiposRegistrados() {
    var storageEquipos = localStorage.getItem('equiposRegistrados')
    if (storageEquipos == null) {
        equiposRegistrados = [];
    } else {
        equiposRegistrados = JSON.parse(storageEquipos);

    }

    return equiposRegistrados;
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

function cargarMiEquipo() {
    //var retos = [];
    var MiEquipoTabla = [];
    
    //var MiEquipoTabla = eliminarEquipoPosicion(equipoLogueado);
    //var contador = 0;
    
    
        
        gridBody = document.querySelector("#tblMiEquipo tbody");
      
        for(var i = 0; i < 5; i++){
            var datos = EquipoPosicion();
            if(datos != null){
            MiEquipoTabla.push(datos);
            }
        }
    gridBody.innerHTML = '';
    
    MiEquipoTabla.forEach(function(x, contadorCampos) {
        //for(var i = 1; i < MiEquipoTabla.l; i++){
            
            //contador++;
        var tr = document.createElement("tr"),
            tdNumero = document.createElement("td"),
            tdIDG = document.createElement("td"),
            tdJugador = document.createElement("td"),
            tdElimnar = document.createElement("td"),
            btnEliminar = document.createElement("button");

        tdNumero.innerHTML = contadorCampos +1;
        tdIDG.innerHTML = x.IDG;
        
           tdJugador.innerHTML = x.jugadorG;
    
        
        
        

        btnEliminar.className = 'delete btn btn-danger btn-sm glyphicon glyphicon-trash';
        btnEliminar.addEventListener('click', function() {
            $(document).ready(function() {
                $('#delete').modal('show');

                $("#del").click(function() {
                    //for (var i = 0; i < arregloListaDelete.length; i++) {
                    eliminarPersonaDeEquipo(x.IDG);
                });
            });

        });


        tdElimnar.appendChild(btnEliminar, contadorCampos);

        tr.appendChild(tdNumero);
        tr.appendChild(tdIDG)
        tr.appendChild(tdJugador);
        tr.appendChild(tdElimnar);


        gridBody.appendChild(tr);
            
    });

}



/*function removeFromLocalStorage(index) {
    var misRetos = [],
        dataInLocalStorage = localStorage.getItem("retosRegistrados");

    misRetos = JSON.parse(dataInLocalStorage);

    misRetos.splice(index, 1);

    localStorage.setItem("retosRegistrados", JSON.stringify(misRetos));

    cargarMisRetosCreados();
}*/


function eliminarPersonaDeEquipo(contador) {
    //var jugadorNuevo = usuarioLogueado;
    var posicion = contador;
    var listEquiposRegistrados = equiposRegistrados;
    var player2 = "";
    var player3 = "";
    var player4 = "";
    var player5 = "";

    for (var i = 0; i < listEquiposRegistrados.length; i++) {
        if (equipoLogueado.nombreTeamG == listEquiposRegistrados[i].nombreTeamG) {
            listEquiposRegistrados[i].capitan = equipoLogueado.capitan;

            if (contador == 1) {
                player2 = "";
            } else {
                player2 = equipoLogueado.jugador2;
            }

            if (contador == 2) {
                player3 = "";

            } else {
                player3 = equipoLogueado.jugador3;
            }

            if (contador == 3) {
                player4 = "";

            } else {
                player4 = equipoLogueado.jugador4;
            }

            if (contador == 4) {
                player5 = "";

            } else {
                player5 = equipoLogueado.jugador5;
            }

            listEquiposRegistrados[i].jugador2 = player2;
            listEquiposRegistrados[i].jugador3 = player3;
            listEquiposRegistrados[i].jugador4 = player4;
            listEquiposRegistrados[i].jugador5 = player5;
            listEquiposRegistrados[i].nombreTeamG = equipoLogueado.nombreTeamG;
            listEquiposRegistrados[i].generoG = equipoLogueado.generoG;
            listEquiposRegistrados[i].cantonG = equipoLogueado.cantonG;
            listEquiposRegistrados[i].generoG = equipoLogueado.generoG;
            listEquiposRegistrados[i].contraseniaG = equipoLogueado.contraseniaG;




            localStorage.setItem('equiposRegistrados', JSON.stringify(listEquiposRegistrados));
            
        }
    }contadorCampos = 0;
    cargarMiEquipo();
    

}

function EquipoPosicion() {
    var equipos = traerEquipoDelJugador();
    var arreglo = [];
    var jugador = {
        IDG: 0,
        jugadorG: ""
    };
   
    var MiEquipoArreglo = [];
    for(var i =contadorCampos; i < 5; i++){
        if(i == 0 && equipos.capitan != ""){
            jugador.IDG = i
            jugador.jugadorG = equipos.capitan; 
            contadorPosicion = 1;
            contadorCampos = contadorPosicion;
            return jugador;
            
        } else if (i == 1 && equipos.jugador2 != ""){
            jugador.IDG = i
            jugador.jugadorG = equipos.jugador2; 
            contadorPosicion = 2;
            contadorCampos = contadorPosicion;
            return jugador;
            
        }else if (i == 2 && equipos.jugador3 != ""){
            jugador.IDG = i
            jugador.jugadorG = equipos.jugador3; 
            contadorPosicion = 3;
            contadorCampos = contadorPosicion;
            return jugador;
            
        }else if (i == 3 && equipos.jugador4 != ""){
            jugador.IDG = i
            jugador.jugadorG = equipos.jugador4; 
            contadorPosicion = 4;
            contadorCampos = contadorPosicion;
            return jugador;
            
        }else if (i == 4 && equipos.jugador5 != ""){
            jugador.IDG = i
            jugador.jugadorG = equipos.jugador5; 
            contadorPosicion = 5;
            contadorCampos = contadorPosicion ;
            return jugador;
        }
        
    
        
    }
    
   
    }
    
  