<?php

/**
* Clase Jornada
*/
class jornada 
{

	//private $idJornada;
	private $semestre;
	private $ano;
	private $fechIni;
	private $fechFin;
	private $descripcion;


	
	function __construct($sem,$ano,$fechini,$fechfin,$descrip){

		//$this->$idJornada = $idjornada;
		$this->semestre = $sem;
		$this->ano = $ano;
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

	public function getAno(){

		return $this->ano;
	}

	public function setAno($ano){

		$this->ano = $ano;
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

?>