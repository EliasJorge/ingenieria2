function validarCouch(){

	var titulo = document.getElementById("titulo");
	var desc = document.getElementById("descrip");
	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var plazas = document.getElementById("capacidad");
	
	var tipo = document.getElementById("alojamiento").selectedIndex;
	var foto = document.getElementById("foto1");
	var fechainicio= document.getElementById("datepicker");
	var fechalimite= document.getElementById("datepicker2");
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
			alert('No debe completar el campo descripcion unicamente con numeros.');
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
		alert('El campo cantidad de huespedes esta vacio.');
		return false;
	}
	if(tipo == null || tipo == 0){
		alert('Debe seleccionar un tipo de hospedaje.');
		return false;
	}
	
	if(!expr.test(foto.value)){
		alert('Debe seleccionar al menos una foto.');
		return false;
	}
	
	
		if(fechainicio.value != ""){
			if(fechalimite.value != ""){
				if(fechalimite.value.length > 0){
					if(fechainicio.value > fechalimite.value){
						alert('La fecha de inicio es mayor que la fecha limite.');
						return false;
					}
				}
			}else{
			alert('Complete el campo fecha fin');
			return false;
		}
		}else{
			alert('Complete el campo fecha inicio');
			return false;
		}
			
		if((fechainicio.value == null || fechainicio.value.length == 0)){
			alert('Complete el campo fecha inicio');
			return false;
		}
		if((fechalimite.value == null || fechalimite.value.length == 0)){
			alert('Complete el campo fecha limite');
			return false;
		}
		return true
	
	
	
	
}

function validarMod(){

	var titulo = document.getElementById("titulo");
	var desc = document.getElementById("descrip");
	var prov = document.getElementById("provincias").selectedIndex;
	var loc = document.getElementById("localidades").selectedIndex;
	var plazas = document.getElementById("capacidad");
	var tipo = document.getElementById("alojamiento").selectedIndex;
	var fechainicio= document.getElementById("datepicker");
	var fechalimite= document.getElementById("datepicker2");
	
	
	
	
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
			alert('No debe completar el campo descripcion unicamente con numeros.');
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
		alert('El campo cantidad de huespedes esta vacio.');
		return false;
	}
	if(tipo == null || tipo == 0){
		alert('Debe seleccionar un tipo de hospedaje.');
		return false;
	}
	
	if(!expr.test(foto.value)){
		alert('Debe seleccionar al menos una foto.');
		return false;
	}
	
	
		if(fechainicio.value != ""){
			if(fechalimite.value != ""){
				if(fechalimite.value.length > 0){
					if(fechainicio.value > fechalimite.value){
						alert('La fecha de inicio es mayor que la fecha limite.');
						return false;
					}
				}
			}else{
			alert('Complete el campo fecha fin');
			return false;
		}
		}else{
			alert('Complete el campo fecha inicio');
			return false;
		}
			
		if((fechainicio.value == null || fechainicio.value.length == 0)){
			alert('Complete el campo fecha inicio');
			return false;
		}
		if((fechalimite.value == null || fechalimite.value.length == 0)){
			alert('Complete el campo fecha limite');
			return false;
		}
		return true
	
	
	
	
}

function validaFechas(){
	var fechainicio= document.getElementById("datepicker");
	var fechalimite= document.getElementById("datepicker2");
	
	if(fechainicio.value != ""){
			if(fechalimite.value != ""){
				if(fechalimite.value.length > 0){
					if(fechainicio.value > fechalimite.value){
						alert('La fecha de inicio es mayor que la fecha limite.');
						return false;
					}
				}
			}else{
			alert('Complete el campo fecha fin');
			return false;
			}
	}else{
			alert('Complete el campo fecha inicio');
			return false;
	}
			
	if((fechainicio.value == null || fechainicio.value.length == 0)){
			alert('Complete el campo fecha inicio');
			return false;
	}
	if((fechalimite.value == null || fechalimite.value.length == 0)){
			alert('Complete el campo fecha limite');
			return false;
	}
		return true
	

	
}


function validarBusqueda(){

	var busqueda = document.getElementById("busqueda");

	if(busqueda.value == null || busqueda.value == 0){
		alert('Ingrese un termino para buscar.');
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
	var tipo = document.getElementById("alojamiento").selectedIndex;

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

function preguntaEliminar (){
	
			if (confirm('¿Esta seguro que desea eliminar la publicacion?')){
				
				document.eliminaPub.submit()
				
			}
			
}

function preguntaModificar (){
	
			if (confirm('¿Esta seguro que desea modificar la publicacion?')){
				
				return true;
				
			}
			
}

function preguntaFotoMod (){
	
			if (confirm('¿Esta seguro que desea agregar las imagenes seleccionadas a la publicacion?')){
				
				document.subeFotos.submit()
				
			}
			
}

function preguntaFotoElim (){
	
			if (confirm('¿Esta seguro que desea eliminar las imagenes seleccionadas de la publicacion?')){
				
				document.eliminaFotos.submit()
				
			}
			
}

function validaCalificacion(){
	
	var calificacion = document.getElementById("calificacion").selectedIndex;
	if(calificacion == null || calificacion == 0){
		alert('Debe seleccionar un valor para calificar.');
		return false;
	}
	
}