$(function () {
	
	// Formatação de campos
	if ($("#cpf_cnpj").length > 0) {
		$("#cpf_cnpj").setMask('999.999.999-99');
	}
	
	// jQuery Mask Version: v0.5.0+
	var SPphoneMask = function(phone, e, currentField, options){
	  return phone.match(/^(\(?11\)? ?9(5[0-9]|6[0-9]|7[01234569]|8[0-9]|9[0-9])[0-9]{1})/g) ? '(00) 00000-0000' : '(00) 0000-0000';
	};
	 
	$("input[name*=telefone]").mask(SPphoneMask, {onKeyPress: function(phone, e, currentField, options){
	  $(currentField).mask(SPphoneMask(phone), options);
	}});
	
	if ($("#cep").length > 0) {
		$("#cep").mask('99999999');
	}
	
	if ($("#numero").length > 0) {
		$("#numero").keypress(function () {
			
			if (!isNaN(String.fromCharCode(window.event.keyCode))) {
				return true;
			} else {
				return false;
			}
			
		});
	}
	
	$(".btnCancelarForm").click(function (e) {
		e.preventDefault();
		history.go(-1);
	});
	
});

function moeda(valor, casas, separdor_decimal, separador_milhar){

	var valor_total = parseInt(valor * (Math.pow(10,casas)));
	var inteiros =  parseInt(parseInt(valor * (Math.pow(10,casas))) / parseFloat(Math.pow(10,casas)));
	var centavos = parseInt(parseInt(valor * (Math.pow(10,casas))) % parseFloat(Math.pow(10,casas)));


	if(centavos%10 == 0 && centavos+"".length<2 ){
		centavos = centavos+"0";
	}else if(centavos<10){
		centavos = "0"+centavos;
	}

	var milhares = parseInt(inteiros/1000);
	inteiros = inteiros % 1000;

	var retorno = "";

	if(milhares>0){
		retorno = milhares+""+separador_milhar+""+retorno
		if(inteiros == 0){
			inteiros = "000";
		} else if(inteiros < 10){
			inteiros = "00"+inteiros;
		} else if(inteiros < 100){
			inteiros = "0"+inteiros;
		}
	}
	retorno += inteiros+""+separdor_decimal+""+centavos;


	return retorno;

}