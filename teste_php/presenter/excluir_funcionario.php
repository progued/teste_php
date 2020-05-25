<?php
require_once("presenter.php");
class ExcluirFuncionario{

    public function __construct(){
        $this->excluir();
    }

    private function excluir(){
        $presenter = new Presenter();
        $presenter->excluirFuncionario($_GET['id']);
    }
}
new ExcluirFuncionario();