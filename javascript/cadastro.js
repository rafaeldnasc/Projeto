
/* mascara de telefone */
function mascaraTelefone(event) {
    let tecla = event.key;
    let telefone = event.target.value.replace(/\D+/g, "");
    if (/^[0-9]$/i.test(tecla)) {
        telefone = telefone + tecla;
        let tamanho = telefone.length;
        if (tamanho >= 12) {
            return false;
        }
        if (tamanho > 10) {
            telefone = telefone.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
        } else if (tamanho > 5) {
            telefone = telefone.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
        } else if (tamanho > 2) {
            telefone = telefone.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
        } else {
            telefone = telefone.replace(/^(\d*)/, "($1");
        }
        event.target.value = telefone;
    }
    if (!["Backspace", "Delete"].includes(tecla)) {
        return false;
    }
}

function valida (){
const aviso = document.getElementById("aviso")
const nome = document.getElementById("nome").value
if(nome.length < 15){
    aviso.innerHTML = "Campo nome inválido!"
    return false
}else{
    aviso.innerHTML - ""
}
const regexnome = /^[a-zA-ZÀ-ú\s]+$/.test(nome)
if(!regexnome){
    aviso.innerHTML = "Campo nome inválido , somente digitos alfabéticos !"
    return false
}else {
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
    aviso.innerHTML = "O campo nome materno deve ter no mínimo 15 letras"
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
const cpf = document.getElementById("cpf").value.replace(/\D+/g, "").trim()
if(cpf.length !== 11 || Array.from(cpf).every(c => c === cpf[0]) ){
    aviso.innerHTML = "CPF inválido !"
    return false
}else{
    aviso.innerHTML = ""
}
var soma = 0
for( let i = 0 ;i < 9 ; i++){
  soma += parseInt(cpf.charAt(i)) * (10 - i)
}
let resto = 11 - (soma % 11)
let digito1 = resto === 11 || resto === 10 ? 0 : resto
if(digito1 !== parseInt(cpf.charAt(9))){
  aviso.innerHTML = "CPF inválido!"
  return false
}else{
  aviso.innerHTML = ""
}

var soma2 = 0
for(let i2 = 0 ; i2 < 10 ; i2++){
  soma2 += parseInt(cpf.charAt(i2)) * (11 - i2)
}
let resto2 = 11 - (soma2 % 11)
let digito2 = resto2 === 10 || resto2 === 11 ? 0 : resto2
if(digito2 !== parseInt(cpf.charAt(10))){
  aviso.innerHTML = 'CPF inválido!'
  return false
}else{
  aviso.innerHTML = ""
}
const telefone = document.getElementById("telefone").value
if(telefone.length < 15){
    aviso.innerHTML = "O campo telefone celular deve ter 16 caracteres numéricos!"
    return false
}else{
    aviso.innerHTML = ""
}
const telefonefi = document.getElementById("telefonefi").value
if(telefonefi.length < 15){
    aviso.innerHTML = "O campo telefone fixo deve ter 16 caracteres numéricos!"
    return false
}else{
    aviso.innerHTML = ""
}

const endereço = document.getElementById("endereço").value
const regexendereço = /\b(av|avenida|rua|bairro)\b/i.test(endereço)
if(endereço.length < 10){
    aviso.innerHTML = "Campo endereço inválido!"
    return false
}else{
    aviso.innerHTML = ""
}
if(!regexendereço){
    aviso.innerHTML = "O campo endereço deve começar por palavras reservadas (como: 'av' ,'avenida' , 'rua'  , 'bairro'"
    return false
}else{
    aviso.innerHTML = ""
}


const senha = document.getElementById("senha").value
if(senha.length < 8){
    aviso.innerHTML = "A senha deve ter no mínimo 8 caracteres!"
    return false
}else{
    aviso.innerHTML = ""
}
const regex_senha_letra_minuscula = /[a-z]/.test(senha)
if(!regex_senha_letra_minuscula){
    aviso.innerHTML = "O campo senha deve ter no mínimo uma letra minuscula!"
    return false
}
else{
    aviso.innerHTML = ""
}
const regex_senha_letramaiuscula = /[A-Z]/.test(senha)
if(!regex_senha_letramaiuscula){
    aviso.innerHTML = "O campo senha deve ter no mínimo uma letra maiuscula !"
    return false
}else{
    aviso.innerHTML = ""
}
const regex_senha_caractereespecial = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(senha)
if(!regex_senha_caractereespecial){
    aviso.innerHTML = "O campo senha deve ter no mínimo um caractere especial <b>(ex: (! , ² ,@...</b>)"
    return false
}else{
    aviso.innerHTML = ""
}
const regex_senha_numero = /\d/.test(senha)
if(!regex_senha_numero){
    aviso.innerHTML = "A senha deve ter pelo menos um número!"
    return false
}else{
    aviso.innerHTML = ""
}
const verificasenha = document.getElementById("senhaconfi").value
if(senha.length !== verificasenha.length){
    aviso.innerHTML = "As senha não coincidem!"
    return false
  }else{
    aviso.innerHTML = ""
    const cep = document.getElementById("cep").value
    if(cep.length != 9){
        aviso.innerHTML = "CEP com numeros de caracteres inválido!"
        return false
    }else{
        aviso.innerHTML = ""
    }
    const sexoSelect = document.getElementById("sexo");
    if (sexoSelect.value === "gen") {
        aviso.innerHTML = "Por favor, selecione um gênero válido.";
        return false
    } else {
        aviso.innerHTML = "";
    }
  return true
  }
}


function mascaraCpf(){
    var papel = document.getElementById('cpf')
  papel.addEventListener ('keyup', function(){
    let inputlength = papel.value.length
    if(inputlength === 3 || inputlength === 7){
      papel.value += '.'
    }else if (inputlength === 11) {
      papel.value += '-'
    }
  })
}
function mascaracep(){
    const inputcep = document.getElementById("cep")
    const meuinput = inputcep.value.length
    if(meuinput === 5){
        inputcep.value += "-"
    }
}