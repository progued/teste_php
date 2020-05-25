<?php
require_once("presenter.php");
class ExcluirDependente{

    public function __construct(){
        $this->excluir();
    }

    private function excluir(){
        $presenter = new Presenter();
        $presenter->excluirDependente($_GET['id_funcionario'],$_GET['id']);
    }
}
new ExcluirDependente();