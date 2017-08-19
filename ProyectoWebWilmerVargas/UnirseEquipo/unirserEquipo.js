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
var seEjecuto = "n";
var equipo ={
    capitan: "",
    jugador2: "",
    jugador3: "",
    jugador4: "",
    jugador5: "",
    nombreEquipo: "",
    categoriaSexo: "",
    canton: "",
    genero: "",
    contrasenia: ""
    
}
var contadorPosicion = 0;


  function validar(){
      var nombre = "";
      var password = "";
      var contador = 0;
      nombre = document.getElementById("form-teamName").value;
      password = document.getElementById("form-passwordTeam").value;
      if (document.getElementById("form-teamName").value == 0) {
        alert("Nombre requerido");
    } else if (document.getElementById("form-passwordTeam").value == 0) {
        alert("Contraseña requerida");
    } else if(confirmacion(nombre,password) == 'n'){
        alert("Equipo o contraseña invalidas");
    } else if(unirseEquipo(equipo) == 0){
        alert("Equipo tiene la maxima capacidad de jugadores");
    } else if(unirPersonaEquipo(contadorPosicion)){
            
        }else{
                     
                 }
            
    
   
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


      
      function confirmacion(equipoName,pw){
          var equipos = getEquiposRegistradas();
          var name = equipoName;
          var pw = pw;
          var existe = 'n';
          for(var i = 0; i < equipos.length; i++) {
              if(equipos[i].nombreTeamG == name && equipos[i].contraseniaG == pw){
                  existe = 's';
                  equipo = equipos[i];
                  return existe;
              } else{
                 existe = 'n';
              }
              
                     
                 
          } return existe;
                                                  
                                                  
                                                  
          
      }

function unirseEquipo(equipo){
    var equipos = equipo;
     contadorPosicion = 0;    
    
        
        if(equipos.jugador2 == ""){
            contadorPosicion = 1;
            
            return contadorPosicion;
        }else if(equipos.jugador3 == ""){
            contadorPosicion = 2;
             
            return contadorPosicion;
        }else if(equipos.jugador4 == ""){
            contadorPosicion = 3;
            
            return contadorPosicion;
        }else if(equipos.jugador5 == ""){
            contadorPosicion = 4; 
            return contadorPosicion;
        }else {
            return contadorPosicion;
        }
         
    
        
    
}


function unirPersonaEquipo(contador){
    var jugadorNuevo = usuarioLogueado;
    var posicion = contador;
    var listEquiposRegistrados = getEquiposRegistradas();
    var player2 = "";
    var player3 = "";
    var player4 = "";
    var player5 = "";
        
    for (var i = 0; i < listEquiposRegistrados.length; i++) {
        if(equipo.nombreTeamG==listEquiposRegistrados[i].nombreTeamG){
                 listEquiposRegistrados[i].usuario = equipo.capitan;
                    
        if(contador == 1){
             player2 = usuarioLogueado.nombreG;
        }else {
            player2 = equipo.jugador2;
        }
            
        if(contador == 2){
            player3 = usuarioLogueado.nombreG;
            
        }else {
            player3 = equipo.jugador3;
        }
            
            if(contador == 3){
            player4 = usuarioLogueado.nombreG;
            
        }else {
            player4 = equipo.jugador4;
        }
            
        if(contador == 4){
            player5 = usuarioLogueado.nombreG;
           
        } else {
            player5 = equipo.jugador5;
        }
        
                 listEquiposRegistrados[i].jugador2 = player2;
                 listEquiposRegistrados[i].jugador3 = player3;
                 listEquiposRegistrados[i].jugador4 = player4;
                 listEquiposRegistrados[i].jugador5 = player5;
                 listEquiposRegistrados[i].nombreTeamG = equipo.nombreTeamG;
                listEquiposRegistrados[i].generoG = equipo.generoG;
                 listEquiposRegistrados[i].cantonG = equipo.cantonG;
                 listEquiposRegistrados[i].generoG = equipo.generoG;
                 listEquiposRegistrados[i].contraseniaG = equipo.contraseniaG;
                 
                 


         
         localStorage.setItem('equiposRegistrados', JSON.stringify(listEquiposRegistrados));  
         alert("Ingreso al equipo exitoso");
         return;
}
     }
    
    
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
/*
function updateUser(){
     var idUserActive = localStorage.getItem('useractive');
     users = JSON.parse(localStorage.getItem('users'));
if(document.getElementById('contrasenna').value==document.getElementById('ccontrasenna').value){
     for (var i = 0; i < users.length; i++) {
         if(idUserActive==users[i].idUsuario){
                 users[i].usuario = document.getElementById('usuario').value;
                 users[i].contrasena =document.getElementById('contrasenna').value;
                 users[i].telefono = document.getElementById('telefono').value;
                 users[i].correo = document.getElementById('correo').value;
                 users[i].direccion = document.getElementById('direccion').value;

                 


         }else{
              alert("Error password");
         }
         localStorage.setItem('users', JSON.stringify(users));
         alert("Actualizacion Completa");
         location.href ="Perfil.html";

     }
}
    }
    
  */