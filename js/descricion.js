// variables
const btnCerrar=document.querySelector(".btnCerrar")
const btnAdelante=document.querySelector(".btnAdelante")
const btnAtras=document.querySelector(".btnAtras")
const imagenes=document.querySelectorAll(".galeria")
const galeriaPrincipal=document.querySelector(".galeriaPrincipal")
const imagenActiva=document.querySelector("#imagenActiva")
let indiceImagen=0;
const galeria=document.querySelector(".galeria")

// abrir galeria principal

galeria.addEventListener("click",(Event)=>{
    galeriaPrincipal.style.display="flex"
    imagenActiva.src=Event.target.src
});

btnCerrar.addEventListener("click",()=>{
    galeriaPrincipal.style.display="none"
});

// const abrirGaleria = (Event)=>{
//     imagenActiva.src=Event.target.src;
//     galeriaPrincipal=style.display="flex";
// };

// imagenes.forEach((imagen) => {
//     imagen.addEventListener("click",abrirGaleria)
    
// });