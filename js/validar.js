function validarCouch(){

	var titulo = document.getElementById("titulo");
	var desc = document.getElementById("descrip");
	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var plazas = document.getElementById("cantplazas");
	var tipo = document.getElementById("tipo").selectedIndex;
	var foto = document.getElementById("foto");
	var expr = /^(?:[\w]\:|\\)(\\[a-z_\-\s0-9\.]+)+\.(png|gif|jpg|jpeg)$/;
	
	if(titulo.value == null || titulo.value == ""){
		alert('El campo titulo esta vacio.');
		return false;
	}
	else{
		if(isNaN(titulo.value) == false){
			alert('NO estan permitidos los numeros en el campo titulo.');
			return false;
		}
	}
	if(desc.value == null || desc.value == ""){
		alert('El campo descripcion esta vacio.');
		return false;
	}
	else{
		if(isNaN(desc.value) == false){
			alert('NO estan permitidos los numeros en el campo descripcion.');
			return false;
		}	
	}
	if(prov == null || prov == 0){
		alert('Debe seleccionar una provincia.');
		return false;
	}
	if(loc == null || loc == 0){
		alert('Debe seleccionar una localidad.');
		return false;
	}
	if(plazas.value == null || plazas.value == 0){
		alert('El campo cantidad de plazas esta vacio.');
		return false;
	}
	if(tipo == null || tipo == 0){
		alert('Debe seleccionar un tipo de couch.');
		return false;
	}
	if(!expr.test(foto.value)){
		alert('Debe seleccionar una foto.');
		return false;
	}
}

function validarBusqueda(){

	var busqueda = document.getElementById("busqueda");

	if(busqueda.value == null || busqueda.value == 0){
		alert('Ingrese un valor a buscar.');
		return false;
	}
	else{
		if(busqueda.value.length > 0){
			if(isNaN(busqueda.value) == false){
				alert('NO estan permitidos los numeros en el campo de busqueda.');
				return false;
			}
		}
	}
}

function validarBusquedaAvanzada(){

	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var desde = document.getElementById("datepicker");
	var hasta = document.getElementById("datepicker2");
	var plazas = document.getElementById("plazas");
	var tipo = document.getElementById("Tipos").selectedIndex;

	if(desde.value != null){
		if(hasta.value != null){
			if(hasta.value.length > 0){
				if(desde.value > hasta.value){
					alert('La fecha desde es mayor que la fecha hasta.');
					return false;
				}
			}
		}
	}
	if((prov == null || prov == 0) && (loc == null || loc == 0) && (desde.value == null || desde.value.length == 0) && (hasta.value == null || hasta.value.length == 0) && (plazas.value == null || plazas.value.length == 0) && (tipo == null || tipo == 0)){
		alert('Complete al menos un campo.');
		return false;
	}
	return true;
}