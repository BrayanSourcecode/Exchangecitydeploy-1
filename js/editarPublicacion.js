const editar=document.querySelectorAll(".editar")
const publicarProductos=document.querySelector(".editarPublicacion")
const cerrarPublicarProductos=document.querySelector(".cerrarPublicarProductos")


// editar.addEventListener("click",()=>{
//     publicarProductos.style.display="flex"
// });





// const editButtons = document.querySelectorAll(".edit-user");
editar.forEach(editBtn => editBtn.addEventListener("click", () => publicarProductos.style.display="flex"));




cerrarPublicarProductos.addEventListener("click",()=>{
    publicarProductos.style.display="none"
})