<?php

/**
* Clase Deporte
*/
class deporte 
{

	private $nombre;
	private $numjug;
	private $jornada;

	
	function __construct($nombre,$numjug,$jornada){

		$this->nombre = $nombre;
		$this->numjug = $numjug;
		$this->jornada = $jornada;

	}
	
	public function getNombre(){

		return $this->nombre;
	}

	public function setNombre($nombre){

		$this->nombre = $nombre;
	}

	public function getNumjug(){

		return $this->numjug;
	}

	public function setNumjug($numjug){

		$this->numjug = $numjug;
	}

	public function getJornada(){

		return $this->jornada;
	}

	public function setJornada($jornada){

		$this->jornada = $jornada;
	}

	

}

?>