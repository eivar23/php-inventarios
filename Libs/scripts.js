$(document).ready(function () {
	$('#tipoPago').on('change', function(){
		var selectValor = '#'+$(this).val();

		if (selectValor == '#Anticipo') {
			$('#pai').children('div').hide();
			$('#pai').children(selectValor).show();
			
		}else{
			$('#pai').children('div').hide();
			$('#pai').children('#Tercero').show();
		}
		//alert(selectValor);
	});
});

$(document).ready(function () {
	function habilitar(value)
	{
		if(value==true)
		{
			// habilitamos
			document.getElementById("tercero").disabled=false;
		}else if(value==false){
			// deshabilitamos
			document.getElementById("tercero").disabled=true;
		}
	}
}