<?php
require_once("../model/funcionario.php");
require_once("../model/dependente.php");
require_once("../model/dao.php");
class Presenter {
    private $dao;

    public function __construct(){
        $this->dao = new Dao();
    }

    public function salvarFuncionario(Funcionario $funcionario_novo){
		$result = $this->dao->inserirFuncionario($funcionario_novo);
    	if($result == true){
            echo "<script>alert('Funcionário cadastrado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function alterarFuncionario(Funcionario $funcionario_novo){
		$result = $this->dao->alterarFuncionario($funcionario_novo);
    	if($result == true){
            echo "<script>alert('Funcionário atualizado com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function salvarDependente(Dependente $dependente_novo){
		$result = $this->dao->inserirDependente($dependente_novo);
		$id_funcionario = $dependente_novo->getIdFuncionario();
    	if($result == true){
            echo "<script>alert('Dependente cadastrado com sucesso!');document.location='../view/lista_dependentes.php?id=".$id_funcionario."'</script>";
        }else{
            echo "<script>alert('Erro ao gravar registro!');history.back()</script>";
        }
    }

    public function listarFuncionarios(){
    	$funcionarios = $this->dao->getConsultaFuncionarios();
        foreach ($funcionarios as $funcionario){
        	if ($funcionario == null){
        		continue;
        	}
            echo "<tr>";
            echo "<td>".$funcionario['nome']."</td>";
            echo "<td>".$funcionario['cpf']."</td>";
            $data = new DateTime($funcionario['data_nascimento']);
            echo "<td>".$data->format('d/m/Y')."</td>";
            echo "<td> R$ ".number_format($funcionario['salario'], 2, ',', '.')."</td>";
            echo "<td><a class='btn btn-warning' href='../view/lista_dependentes.php?id=".$funcionario['id']."'>Dependentes</a></td><td><a class='btn btn-danger' href='../view/editar_funcionario.php?id=".$funcionario['id']."'>Editar</a></td><td><a class='btn btn-danger' href='../presenter/excluir_funcionario.php?id=".$funcionario['id']."'>Excluir</a></td>";
            echo "</tr>";
        }
    }

    public function listarDependentes($id_funcionario){
    	$funcionarios = $this->dao->consultaDependentesFuncionario($id_funcionario);
        foreach ($funcionarios as $funcionario){
        	if ($funcionario == null){
        		continue;
        	}
            echo "<tr>";
            echo "<td>".$funcionario['nome']."</td>";
            echo "<td>".$funcionario['is_calcula_inss'] = ($funcionario['is_calcula_inss'] == 'S')? "SIM":"NÃO"."</td>";
            echo "<td>".$funcionario['is_calcula_ir'] = ($funcionario['is_calcula_ir'] == 'S')? "SIM":"NÃO"."</td>";
            echo "<td><a class='btn btn-danger' href='../presenter/excluir_dependente.php?id=".$funcionario['id']."&id_funcionario=".$id_funcionario."'>Excluir</a></td>";
            echo "</tr>";
        }
    }

    public function consultarFuncionario($id_funcionario){
    	return $this->dao->consultaFuncionario($id_funcionario);
    }

    public function excluirFuncionario($id_funcionario){
    	$result = $this->dao->deleteFuncionario($id_funcionario);
    	if($result == true){
            echo "<script>alert('Funcionário excluído com sucesso!');document.location='../view/index.php'</script>";
        }else{
            echo "<script>alert('Erro ao excluir registro!');history.back()</script>";
        }
    }

    public function excluirDependente($id_funcionario, $id_dependente){
    	$result = $this->dao->deleteDependente($id_dependente);
    	if($result == true){
            echo "<script>alert('Dependente excluído com sucesso!');document.location='../view/lista_dependentes.php?id=".$id_funcionario."'</script>";
        }else{
            echo "<script>alert('Erro ao excluir registro!');history.back()</script>";
        }
    }
}

?>