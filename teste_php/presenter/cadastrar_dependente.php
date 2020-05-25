<?php
require_once("../model/dependente.php");
require_once("presenter.php");
class CadastroDependente{

    public function __construct(){
        $this->cadastrar();
    }

    private function cadastrar(){
        $dependente = new Dependente();
        $dependente->setNome($_POST['nome']);
        $dependente->setIdFuncionario($_POST['id_funcionario']);
        $dependente->setIsCalculaINSS($_POST['is_calcula_inss']);
        $dependente->setIsCalculaIR($_POST['is_calcula_ir']);

        $presenter = new Presenter();
        $presenter->salvarDependente($dependente);
    }
}
new CadastroDependente();