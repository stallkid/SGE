<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Tela de Login</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css"></link>
<link rel="stylesheet" type="text/css" href="css/font-awesome.css"></link>
<link rel="stylesheet" type="text/css" href="css/sweetalert.css"></link>
</head>

<body>
	<div class="container">
		<img src="img/study_icon2.png">
		<form method="post" action="valida.php">
			<div class="form-input">
				<input type="text" name="usuario" placeholder="Enter E-mail">
			</div>
			<div class="form-input">
				<input type="password" name="senha" placeholder="Enter Password">
			</div>
			<input class="form-button" type="submit" value="Entrar">
		</form>
	<form method="post" action="cadastrar_aluno.php">
		<input class="form-button" type="submit" value="cadastrar aluno">
	</form>
	</div>
</body>
</html>
