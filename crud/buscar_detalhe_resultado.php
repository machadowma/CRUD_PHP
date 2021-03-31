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
		$sql = 'SELECT * from pessoa WHERE true';
		if (!empty($_POST["nome"])){
			$sql .= " AND nome LIKE :nome";
		}
		if (!empty($_POST["sobrenome"])){
			$sql .= " AND sobrenome LIKE :sobrenome";
		}
		if (!empty($_POST["sexo"])){
			$sql .= " AND sexo = :sexo";
		}
		$stmt = $dbh->prepare($sql);
		if (!empty($_POST["nome"])){
			$stmt->bindParam(":nome", $nome);
			$nome = "%".$_POST["nome"]."%";
		}
		if (!empty($_POST["sobrenome"])){
			$stmt->bindParam(":sobrenome", $sobrenome);
			$sobrenome = "%".$_POST["sobrenome"]."%";
		}
		if (!empty($_POST["sexo"])){
			$stmt->bindParam(":sexo", $sexo);
			$sexo = $_POST["sexo"];
		}
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
