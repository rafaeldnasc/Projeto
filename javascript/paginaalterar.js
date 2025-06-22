function paginaalterar(){

    const senha = document.getElementById("senha").value
    const resposta = document.getElementById("resposta")
if(senha.length < 8){
     resposta.innerHTML = "A senha deve ter no mínimo 8 caracteres!"
    return false
}else{
    resposta.innerHTML = ""
}
const regex_senha_letra_minuscula = /[a-z]/.test(senha)
if(!regex_senha_letra_minuscula){
    resposta.innerHTML = "O campo senha deve ter no mínimo uma letra minuscula!"
    return false
}
else{
    resposta.innerHTML = ""
}
const regex_senha_letramaiuscula = /[A-Z]/.test(senha)
if(!regex_senha_letramaiuscula){
    resposta.innerHTML = "O campo senha deve ter no mínimo uma letra maiuscula !"
    return false
}else{
    resposta.innerHTML = ""
}
const regex_senha_caractereespecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(senha)
if(!regex_senha_caractereespecial){
    resposta.innerHTML = "O campo senha deve ter no mínimo um caractere especial <b>(ex: (! , ² ,@...</b>)"
    return false
}else{
    resposta.innerHTML = ""
}
const regex_senha_numero = /\d/.test(senha)
if(!regex_senha_numero){
    resposta.innerHTML = "A senha deve ter pelo menos um número!"
    return false
}else{
    resposta.innerHTML = ""
}
const verificasenha = document.getElementById("senhaconfi").value
if(senha.length !== verificasenha.length){
    resposta.innerHTML = "As senha não coincidem!"
    return false
  }else{
    resposta.innerHTML = ""

const sexoSelect = document.getElementById("sexo");
if (sexoSelect.value === "gen") {
    resposta.innerHTML = "Por favor, selecione um gênero válido.";
    return false
} else {
    resposta.innerHTML = "";
}
}
}