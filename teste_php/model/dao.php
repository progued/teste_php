<?php

require_once("config_ini.php");

class Dao{ 

    protected $mysqli;

    public function __construct(){
        $this->conexao();
    }

    private function conexao(){
        $this->mysqli = new mysqli(SERVER, USER , PASS, BD);
    }

    public function inserirFuncionario(Funcionario $funcionario){
        $query = $this->mysqli->prepare("INSERT INTO tb_funcionario (`id`, `nome`, `cpf`, `data_nascimento`, `salario`) VALUES (?,?,?,?,?)");
        $id = $this->geraIdFuncionario();
        $nome = $funcionario->getNome(); 
        $cpf = $funcionario->getCPF(); 
        $data_nascimento = $funcionario->getDataNascimento(); 
        $salario = $funcionario->getSalario();
        $query->bind_param("isssd",$id,$nome,$cpf,$data_nascimento,$salario);
        if( $query->execute() == false){
            return false;
        }
        foreach ($funcionario->getListaDependentes() as $dependente){
        	if ($dependente == null){
        		continue;
        	}
        	if($this->inserirDependente($dependente) == false){
        		return false;
        	}	
        }
        return true;
    }

    public function alterarFuncionario(Funcionario $funcionario){
        $query = $this->mysqli->prepare("UPDATE tb_funcionario SET nome=?, cpf=?, data_nascimento=?, salario=? WHERE id=?");
        $id = $funcionario->getId(); 
        $nome = $funcionario->getNome(); 
        $cpf = $funcionario->getCPF(); 
        $data_nascimento = $funcionario->getDataNascimento(); 
        $salario = $funcionario->getSalario();
        $query->bind_param("sssdi",$nome,$cpf,$data_nascimento,$salario,$id);
        return $query->execute();
    }

    public function inserirDependente(Dependente $dependente){
        $query = $this->mysqli->prepare("INSERT INTO tb_dependente (`id`, `nome`, `id_funcionario`, `is_calcula_inss`, `is_calcula_ir`) VALUES (?,?,?,?,?)");
        $id = $this->geraIdDependente();
        $nome = $dependente->getNome();
        $id_funcionario = $dependente->getIdFuncionario();
        $is_calcula_inss = $dependente->getIsCalculaINSS();
        $is_calcula_ir = $dependente->getIsCalculaIR();
        $query->bind_param("isiss",$id,$nome,$id_funcionario,$is_calcula_inss,$is_calcula_ir);
        return $query->execute();
    }


    public function getConsultaFuncionarios(){
        $result = $this->mysqli->query("SELECT * FROM tb_funcionario");
        $array[] = null;
        while($row = $result->fetch_array(MYSQLI_ASSOC)){            
            $array[] = $row;
        }
        return $array;
    }

    public function getConsultaDependentes($id_funcionario){
        $result = $this->mysqli->query("SELECT * FROM tb_dependente WHERE id=".$id_funcionario.";");
        $array[] = null;
        while($row = $result->fetch_array(MYSQLI_ASSOC)){            
            $array[] = $row;
        }
        return $array;
    }

    public function deleteFuncionario($id_funcionario){
        return $this->mysqli->query("DELETE FROM tb_funcionario WHERE id = ".$id_funcionario.";");
    }

    public function deleteDependente($id_dependente){
        return $this->mysqli->query("DELETE FROM tb_dependente WHERE id = ".$id_dependente.";");
    }

    public function consultaFuncionario($id_funcionario){
        return $this->mysqli->query("SELECT * FROM tb_funcionario WHERE id=".$id_funcionario.";")->fetch_row();
    }

    public function consultaDependente($id_dependente){
        return $this->mysqli->query("SELECT * FROM tb_dependente WHERE id=".$id_dependente.";")->fetch_row();
    }

    public function consultaDependentesFuncionario($id_funcionario){
        $result = $this->mysqli->query("SELECT * FROM tb_dependente WHERE id_funcionario=".$id_funcionario.";");
        $array[] = null;
        while($row = $result->fetch_array(MYSQLI_ASSOC)){            
            $array[] = $row;
        }
        return $array;
    }

    public function geraIdFuncionario(){
        $result = $this->mysqli->query("SELECT MAX(id)+1 AS NOVO_ID FROM tb_funcionario;")->fetch_row();
    	return ($result[0] == 0) ? 1 : $result[0];
    }

    public function geraIdDependente(){
        $result = $this->mysqli->query("SELECT MAX(id)+1 AS NOVO_ID FROM tb_dependente;")->fetch_row();
    	return ($result[0] == 0) ? 1 : $result[0];
    }
}

?>