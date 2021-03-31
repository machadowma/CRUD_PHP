<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8">
</head>
<body>

<?php
	include("banco_dados_conexao.php");	
	
	try {
	
		$dbh = new PDO( $dsn );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmt = $dbh->prepare("insert into pessoa (nome,sobrenome,sexo) values (?,?,?);");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $sobrenome);
		$stmt->bindParam(3, $sexo);

		$nome = $_POST["nome"];
		$sobrenome = $_POST["sobrenome"];
		$sexo = $_POST["sexo"];


		if($stmt->execute())
			echo "Sucesso!";

	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}
?>

<br><br><a href="index.php">voltar</a>
</body>
</html>
