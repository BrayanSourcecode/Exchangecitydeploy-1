
// js para que cuando selecionen administrador puedan poner el codigo 
const RegistroOpcion=document.querySelector(".RegistroOpcion")


RegistroOpcion.addEventListener("change", function() {
    if(RegistroOpcion.value =="Administrador"){
        document.querySelector(".RegistroCodigo").style.display="block"
    
    }else{
        document.querySelector(".RegistroCodigo").style.display="none"
    }
    
});