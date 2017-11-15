<?php

/**
* Clase Jornada
*/
class jornada 
{

	//private $idJornada;
	private $semestre;
	private $año;
	private $fechIni;
	private $fechFin;
	private $descripcion;


	
	function __construct($sem,$año,$fechini,$fechfin,$descrip){

		//$this->$idJornada = $idjornada;
		$this->semestre = $sem;
		$this->año = $año;
		$this->fechIni = $fechini;
		$this->fechFin = $fechfin;
		$this->descripcion = $descrip;
	}
	/*
	public function getId(){

		return $this->idJornada;
	}

	public function setId($idjornada){

		$this->idJornada = $idjornada;
	}
	*/
	public function getSemestre(){

		return $this->semestre;
	}

	public function setSemetre($sem){

		$this->semestre = $sem;
	}

	public function getAño(){

		return $this->año;
	}

	public function setAño($año){

		$this->año = $año;
	}

	public function getFechainicio(){

		return $this->fechIni;
	}

	public function setFechainicio($fechaini){

		$this->fechIni = $fechaini;
	}

	public function getFechafin(){

		return $this->fechFin;
	}

	public function setFechafin($fechafin){

		$this->fechFin = $fechafin;
	}

	public function getDescripcion(){

		return $this->descripcion;
	}

	public function setDescripcion($descrip){

		$this->descripcion = $descrip;
	}

}

$jornada = new jornada("2","2017","08/11/2017","14/11/2017","Jornada Deportiva Ingenieria de Sistemas");

echo "Objeto jornada: ".$jornada->getDescripcion(); 

?>