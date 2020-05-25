<?php

class Funcionario {

	private $id;
	private $nome;
	private $cpf;
	private $data_nascimento;
	private $salario;
	private $lista_dependetes;

	public function __construct(){
        $this->lista_dependetes = new ArrayObject();
    }

	public function setId($value){
		$this->id = $value;
	}

	public function setNome($value){
		$this->nome = $value;
	}

	public function setCPF($value){
		$this->cpf = $value;
	}

	public function setDataNascimento($value){
		$this->data_nascimento = $value;
	}

	public function setSalario($value){
		$this->salario = $value;
	}

	public function vincularDependente(Dependente $value){
		$this->lista_dependetes->append($value);
	}

	public function getId(){
		return $this->id;
	}

	public function getNome(){
		return $this->nome;
	}

	public function getCPF(){
		return $this->cpf;
	}

	public function getDataNascimento(){
		return $this->data_nascimento;
	}

	public function getSalario(){
		return $this->salario;
	}

	public function getListaDependentes(){
		return $this->lista_dependetes;
	}
}

?>