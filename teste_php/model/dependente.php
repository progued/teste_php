<?php

class Dependente {

	private $id;
	private $nome;
	private $id_funcionario;
	private $is_calcula_inss;
	private $is_calcula_ir;

	public function setId($value){
		$this->id = $value;
	}

	public function setNome($value){
		$this->nome = $value;
	}

	public function setIdFuncionario($value){
		$this->id_funcionario = $value;
	}

	public function setIsCalculaINSS($value){
		$this->is_calcula_inss = $value;
	}

	public function setIsCalculaIR($value){
		$this->is_calcula_ir = $value;
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getIdFuncionario(){
		return $this->id_funcionario;
	}

	public function getIsCalculaINSS(){
		return $this->is_calcula_inss;
	}

	public function getIsCalculaIR(){
		return $this->is_calcula_ir;
	}
}

?>