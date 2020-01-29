document.getElementById("vali").onsubmit = validaCad;

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
	if((email.value == "") || (email.value.indexof("@")== -1)){
		erro_email.innerHTML = "Digite seu Email";
		erro_email.style.display = 'block';
		contErro+=1;
	}else
	{
		erro_email.style.display = "none";
	}
	var senha = document.getElementById("senha");
	var erro_senha =document.getElementById("msg-senha");
	if(senha.value ==""){
		erro_senha.innerHTML ="Por favor digite a senha";
		erro_senha.style.display ='block';
		contErro+=1
	}else if(senha.value.length <6){
		erro_senha.innerHTML="A Senha deve possuir pelo menos 6 caracteres";
		erro_senha.style.display='block';
		contErro+=1
	}
	else{
		erro_senha.c='none';
	}
	var senha2 = document.getElementById("senha2");
	var erro_senha2 = document.getElementById("msg-senha2");
	if((senha2.value == "") || (senha.value != senha2.value)){
		erro_senha2.innerHTML ="A senha não confere";
		erro_senha2.style.display = 'block';
		contErro+=1;
	}
	else{
		erro_senha2.style.display='none';
	}
	if (contErro>0){
		return false;
	}
	else{
		alert("Registro completo");
	}
}