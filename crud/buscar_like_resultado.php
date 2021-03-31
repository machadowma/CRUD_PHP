<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8" >
</head>
<body>
	<h1>Resultado da Busca</h1>
	<?php
	
	include("banco_dados_conexao.php");	
	
	try {
	
		$dbh = new PDO( $dsn );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$stmt = $dbh->prepare('SELECT * from pessoa WHERE nome LIKE ?');
		$stmt->bindParam(1, $nome);
		$nome = "%".$_POST["nome"]."%";
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $row) {
			foreach($row as $value){
				echo "$value - ";
			}
			echo "<br>";
		}
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}

	
	?>

	<br>
	<a href='index.php'>Voltar</a>

</body>
</html>
