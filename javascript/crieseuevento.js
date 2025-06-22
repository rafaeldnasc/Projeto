function nossoevento(){
    const evento = document.getElementById("evento").value
    const mensagem = document.getElementById("mensagemErro")
    if(evento.length <= 9){
        mensagem.innerHTML = "O campo evento deve ter no mínimo 10 caracteres!"
        return false
    }else{
        mensagem.innerHTML = ""
    }
    const regexcriarevento =/^[a-zA-ZÀ-ú\s]+$/.test(evento)
    if(!regexcriarevento){
        mensagem.innerHTML = "O campo evento deve ser composto por letras!"
        return false
    }else{
        mensagem.innerHTML =""
    }
    const cidade = document.getElementById("cidade").value
    if(cidade.length < 5){
        mensagem.innerHTML = "O campo cidade deve ter no mínimo 5 caracteres!"
        return false
    }else{
        mensagem.innerHTML = ""
    }
    const regexcidadeletras = /^[a-zA-ZÀ-ú\s]+$/.test(cidade)
    if(!regexcidadeletras){
        mensagem.innerHTML = "O campo cidade deve ser composto apenas por letras!"
        return false
    }else{
        mensagem.innerHTML = ""
    }
    const estadoSelect = document.getElementById("estado");
if (estadoSelect.value === "est") {
    mensagem.innerHTML = "Por favor, selecione um estado!";
    return false
} else {
    mensagem.innerHTML = "";
}



const data = document.getElementsByName("data")
let selecionado = false
for(let i = 0 ; i < data.length ; i++){
  if(data[i].value === ""){
    selecionado = true
    break
  }
}
if(selecionado){
  mensagem.innerHTML = 'Por favor , preencha a data de nascimento !'
  return false
}else{
  mensagem.innerHTML = ''
}
const publico = document.getElementById("publico").value
if(publico.length < 5){
    mensagem.innerHTML = "No campo publico esperado deve ter no mínimo 5 caracteres!"
    return false
}else{
    mensagem.innerHTML =""
}
const regexpublicoletras = /^[a-zA-ZÀ-ú\s]+$/.test(publico)
if(!regexpublicoletras){
    mensagem.innerHTML = "No campo público esperado só deve ter letras! "
    return false
}else{
    mensagem.innerHTML = ""
}
const ticket = document.getElementById("ticket").value
if(ticket.length < 5){
    mensagem.innerHTML = "No campo ticket médio deve ter mínimo 5 caracteres!"
    return false
}else{
    mensagem.innerHTML = ""
}
const regexticketletra = [0-9].test(ticket)
if(regexticketletra){
    mensagem.innerHTML = "No campo ticket médio só deve ter numeros!"
    return false
}else{
    mensagem.innerHTML = ""
}
const regexticketmaiuscula = /^[A-Z]/.test(ticket)
if(!regexticketmaiuscula){
    mensagem.innerHTML = "No campo ticket médio a primeira letra deve ser maiuscula!"
    return false
}else{
    mensagem.innerHTML = ""
}
const perfil = document.getElementById("perfil").value
if(perfil.length < 5){
    mensagem.innerHTML = "Você deve preencher um perfil de instagram!"
    return false
}else{
    mensagem.innerHTML = ""
}
 const regexperfil = /^@([A-Za-z0-9_\.]{1,30})$/.test(perfil);
 if(!regexperfil){
    mensagem.innerHTML = "O campo perfil deve ter o @";
    return false
 }else{
    mensagem.innerHTML = ""
 }

 
 const mensagemTexto = document.getElementById("mensagemTexto").value
 if(mensagemTexto.length < 10){
    mensagem.innerHTML = "O campo de descrição sobre o evento deve ter no mínimo 10 caracteres"
    return false
 }else{
    mensagem.innerHTML = ""
 }
return true
}