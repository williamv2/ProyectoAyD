<?php

/**
* Clase Delegado
*/
class delegado 
{

	private $codigo;
	private $clave;
	private $tipo;
	private $asigna;


	
	function __construct($codigo,$clave,$tipo,$asigna){

		//$this->$idJornada = $idjornada;
		$this->codigo = $codigo;
		$this->clave = $clave;
		$this->tipo = $tipo;
		$this->asigna = $asigna;
	}

	public function getCodigo(){

		return $this->codigo;
	}

	public function setCodigo($codigo){

		$this->codigo = $codigo;
	}

	public function getClave(){

		return $this->clave;
	}

	public function setClave($clave){

		$this->clave = $clave;
	}

	public function getTipo(){

		return $this->tipo;
	}

	public function setTipo($tipo){

		$this->tipo = $tipo;
	}

	public function getAsigna(){

		return $this->asigna;
	}

	public function setAsigna($asigna){

		$this->asigna = $asigna;
	}

}

?>