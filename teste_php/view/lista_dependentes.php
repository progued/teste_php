<?php require_once("../presenter/presenter.php");?>
<!DOCTYPE html>
<?php 
    $presenter = new Presenter(); 
    $funcionario = $presenter->consultarFuncionario($_GET['id']);
?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>CooperTec</title>
  </head>
<body>
    <h2>Funcionário</h2>
    <div class="row">
        <form id="form_funcionario" name="form_funcionario" class="col-10">
            <div class="form-group">
                <table class="table">
                    <tr>
                        <td><label>Nome</label></td>
                        <td><input class="form-control" type="text" id="nome" name="nome" value="<?php echo $funcionario[1]; ?>" disabled></td>
                    </tr>
                    <tr>
                        <td><label >CPF</label>
                        <td><input class="form-control" type="cpf" maxlength="14" id="cpf" name="cpf" value="<?php echo $funcionario[2]; ?>" disabled></td>
                    </td>
                </table>
            </div>
        </form>
    </div>
    <h3>Dependentes</h3><br>
    <div class="row">
        <form method="post" action="../presenter/cadastrar_dependente.php" id="form" name="form" class="col-10">
            <div class="form-group">
            	<table class="table">
            		<tr>
            			<td><label>Nome</label></td>
                		<td><input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus></td>
                	</tr>
                	<tr>
            			<td><label >Calcula INSS</label>
                		<td>
                            <select name="is_calcula_inss" id="is_calcula_inss">
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select>
                        </td>
                	</td>
                	<tr>
            			<td><label >Calcula IR</label></td>
                        <td>
                            <select name="is_calcula_ir" id="is_calcula_ir">
                                <option value="N">NÃO</option>
                                <option value="S">SIM</option>
                            </select>
                        </td>
                	</tr>
                	<input type="hidden" id="id_funcionario" name="id_funcionario" value="<?php echo $_GET['id']; ?>">
                </table>
            </div>
            <div class="form-group">
                <a class='btn btn-success' href='index.php'>Voltar</a>
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Calcula INSS</th>
                <th>Calcula IR</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $presenter->listarDependentes($_GET['id']); ?>
        </tbody>
    </table>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>