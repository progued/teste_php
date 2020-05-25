<?php
require_once("../model/funcionario.php");
require_once("../model/dependente.php");
require_once("presenter.php");
class CadastroFuncionario{

    public function __construct(){
        $this->cadastrar();
    }

    private function cadastrar(){
        $funcionario = new Funcionario();
        $funcionario->setNome($_POST['nome']);
        $funcionario->setCPF($_POST['cpf']);
        $funcionario->setDataNascimento(date('Y-m-d',strtotime($_POST['data_nascimento'])));
        $funcionario->setSalario($_POST['salario']);

        // $dependente = new Dependente();
        // $dependente->setNome('teste');
        // $dependente->setIdFuncionario(1);
        // $dependente->setIsCalculaINSS('S');
        // $dependente->setIsCalculaIR('N');

        // $funcionario->vincularDependente($dependente);

        $presenter = new Presenter();
        $presenter->salvarFuncionario($funcionario);
    }
}
new CadastroFuncionario();