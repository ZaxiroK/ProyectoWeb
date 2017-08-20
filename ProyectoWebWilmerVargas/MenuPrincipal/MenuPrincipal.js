var equiposRegistrados = [];
var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};



function btnMiEquipo() {
    if(btnMiEquipoValidar()=='s'){
        location.href ="../MiEquipo/GranChallengeMiEquipo.html";
    }
    else{
        alert("Aun no tienes equipo");
    }
}    
   
function btnMiEquipoValidar(){
    var equipos = getEquiposRegistradas();
    var tieneEquipo = 'n';    
    
    for (var i = 0; i < equipos.length; i++) {
        if(usuarioLogueado.nombreG == equipos[i].capitan){
            tieneEquipo = 's';
            return tieneEquipo;
            
        }else if(usuarioLogueado.nombreG == equipos[i].jugador2){
            location.href ="../MiEquipo/GranChallengeMiEquipo.html";
            tieneEquipo = 's';
            return tieneEquipo;
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador3){
            location.href ="../MiEquipo/GranChallengeMiEquipo.html";
            tieneEquipo = 's';
            return tieneEquipo;
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador4){
            location.href ="../MiEquipo/GranChallengeMiEquipo.html";
            tieneEquipo = 's';
            return tieneEquipo;
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador5){
            location.href ="../MiEquipo/GranChallengeMiEquipo.html";
            tieneEquipo = 's';
            return tieneEquipo;
            }
         
        }return tieneEquipo;
         
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
function asignarNombreLabel(){
    var label = document.getElementById("usuario");
    var usuario = traerUsuarioLogueado();
    console.log(usuario.nombreG);
    label.innerText = usuario.nombreG;
}
asignarNombreLabel();

function getEquiposRegistradas() {
    var storageEquipos = localStorage.getItem('equiposRegistrados')
    if (storageEquipos == null) {
        equiposRegistrados = [];
    } else {
        equiposRegistrados = JSON.parse(storageEquipos);

    }

    return equiposRegistrados;
}

function btnGrandChallenge(){
    
     if(validarBtnGrandChallenge() == 's'){
         location.href ="../CrearMisChallenges/GrandChallengeCrearMisRetos.html";
         }else {
             alert("Tienes que tener equipo para buscar un reto");
         }
    
    
}

function validarBtnGrandChallenge(){
    var equipos = getEquiposRegistradas();
        
    
    for (var i = 0; i < equipos.length; i++) {
        var existe = 'n';
        if(usuarioLogueado.nombreG == equipos[i].capitan){
            return existe = 's';
            
            
        }else if(usuarioLogueado.nombreG == equipos[i].jugador2){
            return existe = 's';
            
           
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador3){
            return existe = 's';
            
            
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador4){
            return existe = 's';
            
            
            }
        else if(usuarioLogueado.nombreG == equipos[i].jugador5){
            return existe = 's';
            }
           
            } return existe;
}