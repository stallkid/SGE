<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Cadastro de Usuário</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"></link>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css"></link>
</head>

<body>
	<div class="container-cadastro">
		<img src="img/study_icon2.png">
		<h6>CADASTRO DO USUÁRIO</h6>
		<form method="post" action="cadastrar.php">
			<div class="form-input">
				<input type="text" name="nome" placeholder="Escreva o Nome">
			</div>
			<div class="form-input">
				<input type="text" name="usuario" placeholder="Escreva o Usuário">
			</div>
			<div class="form-input">
				<input type="text" name="senha" placeholder="Escreva a Senha">
			</div>
			<div class="form-input">
				<input type="text" name="telefone" placeholder="Escreva o Telefone">
			</div>
			<div class="form-input">
				<select name="curso">
              <option value="">Selecione o Curso</option>
              <option value="Informatica">Informatica</option>
              <option value="Administracao">Administracao</option>
              <option value="Eletroeletronica">Eletroeletronica</option>
        </select>
			</div>
			<input class="form-button" type="submit" value="Cadastrar" name="cadastrar">
		</form>
	<form method="post" action="login.php">
		<input class="form-button" type="submit" value="cancelar">
	</form>
	</div>
</body>
</html>
