<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8">
</head>
<body>
	<h1>Cadastro</h1>
	<form method="post" action="cadastro_insert.php">
	<br>Nome: <input type="text" name="nome">
	<br>Sobrenome: <input type="text" name="sobrenome">
	<br>Sexo: <input type="radio" name="sexo" value='F'>Feminino <input type="radio" name="sexo" value='M'>Masculino
	<br><input type="submit" name="inserir" value="Inserir">
	</form>
<br><br><a href="index.php">voltar</a>
</body>
</html>