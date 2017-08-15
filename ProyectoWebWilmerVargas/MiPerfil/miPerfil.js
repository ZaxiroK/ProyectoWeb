var usuarioLogueado = {
    pk: "",
    nombre: "",
    apellido: "",
    genero: "",
    telefono: "",
    usuario: "",
    contrasenia: ""
};

$(function() {



})

function traerUsuarioLogueado() {
    var usuarioCascaron = localStorage.getItem('personaLogueada')
    if (usuarioCascaron == null) {
        alert("contacta a un administrador");
    } else {
        usuarioLogueado = JSON.parse(contadorPkeys);

    }
    return usuarioLogueado;
}

/*function imprimirDatos(){
    var persona = traerUsuarioLogueado(),
        /*nombre = document.getElementById("form-firtsname").value;
        nombre = document.getElementById("form-firtsname").value;*/
       /* label = document.querySelector('#usuario label');
    
    label.innerHTML = '';
        
        label.innerHTML = persona.nombre
    
            
    }*/
