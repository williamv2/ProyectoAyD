<?php

/**
* Clase Equipo
*/
class equipo 
{

	private $nombre;
	private $deporte;

	
	function __construct($nombre,$deporte){

		$this->nombre = $nombre;
		$this->deporte = $deporte;

	}
	
	public function getNombre(){

		return $this->nombre;
	}

	public function setNombre($nombre){

		$this->nombre = $nombre;
	}

	public function getDeporte(){

		return $this->deporte;
	}

	public function setDeporte($deporte){

		$this->deporte = $deporte;
	}

	

}

?>