function atualizaValor(codProduto, unitario, quantidade){
	// atualiza valor unitario
	var req = new XMLHttpRequest(); // novo objeto no browser
	req.open("POST", "alteraQuantidade.php", true);
	req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	req.send("idProduto="+codProduto+"&quantidade="+quantidade);

	req.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){ // retorno OK
			// define o que acontece quando vier o retorno OK do servidor
			document.getElementById("total"+codProduto).innerHTML = (unitario.replace(",", ".") * quantidade).toFixed(2).replace(".", ",");
			document.getElementById("totalPedido").innerHTML = this.responseText;
		}
	};

	// atualiza valor total
	//atualizaTotal();
}

function atualizaTotal(){
	var total = 0;
	lista = document.getElementsByClassName("totalUni");
	for (i = 0; i < lista.length; i++) {
		total += parseFloat(lista[i].innerHTML.replace(",", "."));
	}
	if(document.getElementById("frete2").checked){
		var frete = parseFloat(document.getElementById("frete2").value);
		total += frete;
		document.getElementById("frete").innerHTML = frete.toFixed(2).replace(".", ",");
	}
	else
		document.getElementById("frete").innerHTML = "0,00";

	document.getElementById("totalPedido").innerHTML = total.toFixed(2).replace(".", ",");
}

document.body.onload = function(){ // atualizar valor no momento em que a página é carregada
	atualizaTotal();
};

