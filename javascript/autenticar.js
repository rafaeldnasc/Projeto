
function mascaracep(){
    const inputcep = document.getElementById("cep")
    const meuinput = inputcep.value.length
    if(meuinput === 5){
        inputcep.value += "-"
    }
}
function cep(){
    const cep = document.getElementById("cep").value
if(cep.length != 9){
    aviso.innerHTML = "CEP com numeros de caracteres inválido!"
    return false
}else{
    aviso.innerHTML = ""
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
  aviso.innerHTML = 'Por favor , preencha a data de nascimento !'
  return false
}else{
  aviso.innerHTML = ''
}

const nomema = document.getElementById("nomema").value
if(nomema.length < 10){
    aviso.innerHTML = "O campo nome materno deve ter no mínimo 10 letras"
    return false
}else{
    aviso.innerHTML = ""
}
const regexnomemamaiusculo = /^[A-Z]/.test(nomema)
if (!regexnomemamaiusculo){
    aviso.innerHTML = "O campo nome materno o primeiro digito deve ser maiusculo !"
    return false
}else{
    aviso.innerHTML = ""
}
const regexnomema = /^[a-zA-ZÀ-ú\s]+$/.test(nomema)
if(!regexnomema){
    aviso.innerHTML = "No campo nome materno , o campo deve ser preenchido apenas por letras"
    return false
}else{
    aviso.innerHTML = ""
}
}