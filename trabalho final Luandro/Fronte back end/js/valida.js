document.getElementById("form-validaloc").onsubmit = validaCad;

function validaCad(){
	var contErro = 0;

	
	var nome = document.getElementById("nome");
	var erro_nome = document.getElementById("msg-nome");
	if((nome.value == "")){
		erro_nome.innerHTML = "Digite seu Nome";
		erro_nome.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_nome.style.display = "none";
	}

	var email = document.getElementById("email");
	var erro_email = document.getElementById("msg-email");
	if((email.value == "") || (email.value.indexOf("@") == -1)){
		erro_email.innerHTML = "Por favor digite o E-mail";
		erro_email.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_email.style.display = 'none';
	}

	var senha = document.getElementById("senha");
	var erro_senha = document.getElementById("msg-senha");
	if(senha.value == ""){
		erro_senha.innerHTML = "Por favor digite a Senha";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else if (senha.value.length < 6){
		erro_senha.innerHTML = "A Senha deve possuir pelo menos 6 caracteres";
		erro_senha.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha.style.display = 'none';
	}

	var senha2 = document.getElementById("senha2");
	var erro_senha2 = document.getElementById("msg-senha2");
	if((senha2.value == "") || (senha.value != senha2.value)){
		erro_senha2.innerHTML = "A senha não confere";
		erro_senha2.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha2.style.display = 'none';
	}

	var fone = document.getElementById("fone");
	var erro_fone = document.getElementById("msg-fone");
	if((fone.value == "")){
		erro_fone.innerHTML = "Informe o seu telefone";
		erro_fone.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_fone.style.display = "none";
	}

	var rg = document.getElementById("rg");
	var erro_rg = document.getElementById("msg-rg");
	if((rg.value == "")){
		erro_rg.innerHTML = "Digite seu RG";
		erro_rg.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_rg.style.display = "none";
	}

	var ender = document.getElementById("ender");
	var erro_ender = document.getElementById("msg-ender");
	if((ender.value == "")){
		erro_ender.innerHTML = "Digite seu Endereço";
		erro_ender.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_ender.style.display = "none";
	}

	var concordo = document.getElementById("concordo");
	var erro_concordo = document.getElementById("msg-concordo");
	if(!concordo.checked){
		erro_concordo.innerHTML = "É necessário que você concorde com os termos de uso";
		erro_concordo.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_concordo.style.display = 'none';
	}

	if(contErro > 0){
		return false;
	}
	else{
		alert("✓ Concluido!");
	}
}


var cpf = document.getElementById("cpf");
var erro_cpf = document.getElementById("msg-cpf");
function TestaCPF(cpf) {
    var Soma;
    var Resto;
    Soma = 0;
  if (cpf == "00000000000") return false;
     
  for (i=1; i<=9; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (11 - i);
  Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(9, 10)) ) return false;
   
  Soma = 0;
    for (i = 1; i <= 10; i++) Soma = Soma + parseInt(cpf.substring(i-1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
   
    if ((Resto == 10) || (Resto == 11))  Resto = 0;
    if (Resto != parseInt(cpf.substring(10, 11) ) ) return false;
    return true;
}
var cpf = "12345678909";
(TestaCPF(cpf));