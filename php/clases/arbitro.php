<?php

/**
* Clase Arbitro
*/
class arbitro 
{

	
	private $cedula;
	private $nombre;
	private $apellido;
	private $deporte;
	private $partido;


	
	function __construct($cedula,$nombre,$apellido,$deporte,$partido){

		$this->cedula = $cedula;
		$this->nombre = $nombre;
		$this->apellido= $apellido;
		$this->deporte = $deporte;
		$this->partido = $partido;
	}

	public function getCedula(){

		return $this->cedula;
	}

	public function setCedula($cedula){

		$this->cedula = $cedula;
	}

	public function getNombre(){

		return $this->nombre;
	}

	public function setNombre($nombre){

		$this->nombre = $nombre;
	}

	public function getApellido(){

		return $this->nombre;
	}

	public function setApellido($apellido){

		$this->nombre = $nombre;
	}

	public function getDeporte(){

		return $this->deporte;
	}

	public function setDeporte($deporte){

		$this->deporte = $deporte;
	}

	public function getPartido(){

		return $this->partido;
	}

	public function setPartido($partido){

		$this->partido = $partido;
	}

}

?>