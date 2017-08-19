var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};

function btnGrandChallenge() {
    
    alert("Tienes que tener equipo para buscar un reto");

        //window.open("../CrearMisChallenges/GrandChallengeCrearMisRetos.html")
    }

function btnMiEquipo() {
    
    alert("Aun no tienes equipo");

        //window.open("../MiEquipo/GranChallengeMiEquipo.html")
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