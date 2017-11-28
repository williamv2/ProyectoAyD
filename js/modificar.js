// Funcion para Modificar

function modificarequipo(idEqu, nombre, cantjug, deporte) {

        document.getElementById('midequi').value = idEqu;
        document.getElementById('mideq').value = idEqu;
        document.getElementById('mnomEq').value = nombre;
        document.getElementById('mcantju').value = cantjug;
        document.getElementById('mdeporte').value = deporte;
         
}

function modificardelegado(iddel,codigo, clave, nombre, descrip){

	document.getElementById('midde').value = iddel;
        document.getElementById('middel').value = iddel;
        document.getElementById('mcoddel').value = codigo;
        document.getElementById('mclvdel').value = clave;
        document.getElementById('mnomdel').value = nombre;
        document.getElementById('mjdel').value = descrip;
}

function modificarcrono(idjornada, semestre, ano, fechaini, fechafin, descrip){

	document.getElementById('midcron').value = idjornada;
        document.getElementById('midcrono').value = idjornada;
        document.getElementById('msem').value = semestre;
        document.getElementById('mano').value = ano;
        document.getElementById('mfechini').value = fechaini;
        document.getElementById('mfechfin').value = fechafin;
        document.getElementById('mdescrip').value = descrip;
}

function modificararbitro(cedula, nombre, apellido, deporte, fecha){

	document.getElementById('mced').value = cedula;
        document.getElementById('mcedula').value = cedula;
        document.getElementById('mnomarb').value = nombre;
        document.getElementById('mapearb').value = apellido;
        document.getElementById('mdeparb').value = deporte;
        document.getElementById('mfechpart').value = fecha;
        
}

function modificardeporte(iddepor, nombre, cantij, jornada){

	document.getElementById('middep').value = iddepor;
        document.getElementById('middepor').value = iddepor;
        document.getElementById('mnomdep').value = nombre;
        document.getElementById('mnumjug').value = cantij;
        document.getElementById('mjord').value = jornada;
        
}

function modificardeportista(codigo, nombre, apellido, edad, genero, correo, equipo){

	document.getElementById('mcodts').value = codigo;
        document.getElementById('mcoddts').value = codigo;
        document.getElementById('mnomdts').value = nombre;
        document.getElementById('mapedts').value = apellido;
        document.getElementById('meddts').value = edad;
        document.getElementById('mgedts').value = genero;
        document.getElementById('mcordts').value = correo;
        document.getElementById('meqdts').value = equipo;
        
}

function modificarpartido(idpartido, fecha, lugar, fase, eqlocal, eqvisi, pvisi, plocal){

	document.getElementById('midpar').value = idpartido
        document.getElementById('midpartido').value = idpartido;
        document.getElementById('mfech').value = fecha;
        document.getElementById('mlugar').value = lugar;
        document.getElementById('mfase').value = fase;
        document.getElementById('meqlocal').value = eqlocal;
        document.getElementById('meqvisi').value = eqvisi;
        document.getElementById('mpvisi').value = pvisi;
        document.getElementById('mplocal').value = plocal;
        
}