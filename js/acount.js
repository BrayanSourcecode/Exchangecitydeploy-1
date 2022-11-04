//js para  que cuando den en el acount puedan ver el login o registrarse 

const  bottom=document.querySelector(".bottom")
const  acount=document.querySelector(".acount")


bottom.addEventListener("click",()=>{
    acount.classList.toggle("verAcount");
})
