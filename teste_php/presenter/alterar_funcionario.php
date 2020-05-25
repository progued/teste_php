<?php
require_once("../model/funcionario.php");
require_once("presenter.php");
class CadastroFuncionario{

    public function __construct(){
        $this->cadastrar();
    }

    private function cadastrar(){
        $funcionario = new Funcionario();
        $funcionario->setId($_POST['id']);
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCPF($_POST['cpf']);
        $funcionario->setDataNascimento(date('Y-m-d',strtotime($_POST['data_nascimento'])));
        $funcionario->setSalario($_POST['salario']);

        $presenter = new Presenter();
        $presenter->alterarFuncionario($funcionario);
    }
}
new CadastroFuncionario();