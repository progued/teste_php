<?php require_once("../presenter/presenter.php");?>
<!DOCTYPE html>
<?php $presenter = new Presenter(); ?>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>CooperTec</title>
  </head>
<body>
	<h2>Funcionários</h2>
    <div class="row">
        <form method="post" action="../presenter/cadastrar_funcionario.php" id="form" name="form" class="col-10">
            <div class="form-group">
            	<table class="table">
            		<tr>
            			<td><label>Nome</label></td>
                		<td><input class="form-control" type="text" id="nome" name="nome" placeholder="Nome" required autofocus></td>
                	</tr>
                	<tr>
            			<td><label >CPF</label>
                		<td><input class="form-control" type="cpf" maxlength="14" id="cpf" name="cpf" placeholder="CPF" required></td>
                	</td>
                	<tr>
            			<td><label >Data de nascimento</label></td>
                		<td><input class="form-control" type="date" id="data_nascimento" name="data_nascimento" placeholder="Data de nascimento"></td>
                	</tr>
                	<tr>
            			<td><label >Salário</label></td>
                		<td><input class="form-control" type="text" id="salario" name="salario" placeholder="Salário"></td>
                	</tr>
                </table>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success" id="cadastrar">Cadastrar</button>
            </div>
        </form>
    </div>
    <br>
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Data de Nascimento</th>
                <th>Salário</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $presenter->listarFuncionarios(); ?>
        </tbody>
    </table>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>