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

		$stmt = $dbh->prepare("update pessoa set nome=?,sobrenome=?,sexo=? where id=?");
		$stmt->bindParam(1, $nome);
		$stmt->bindParam(2, $sobrenome);
		$stmt->bindParam(3, $sexo);
		$stmt->bindParam(4, $id);

		$nome = $_POST["nome"];
		$sobrenome = $_POST["sobrenome"];
		$sexo = $_POST["sexo"];
		$id = $_POST["id"];

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
