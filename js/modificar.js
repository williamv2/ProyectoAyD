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