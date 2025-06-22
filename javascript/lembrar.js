function verificar(){
 const aviso = document.getElementById("resposta")
  const email = document.getElementById("email").value
if(email.length < 10){
    aviso.innerHTML = "E-mail! inválido!"
    return false
}else{
    aviso.innerHTML = ""
}
const regexemail =  /\S+@\S+\.\S+/.test(email)
if(!regexemail){
    aviso.innerHTML = "Email inválido!"
    return false
}else{
    aviso.innerHTML = ""
}
}