<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8" >
</head>
<body>
	<h1>Lista</h1>
	<?php
	
	
	include("banco_dados_conexao.php");
	
	try {
	
		$dbh = new PDO( $dsn );
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sth = $dbh->prepare('SELECT * from pessoa');
		$sth->execute();
		$result = $sth->fetchAll(PDO::FETCH_ASSOC);
		
		// escrevendo cabeçalho a partir dos índices do vetor FETCH_ASSOC
		foreach($result[0] as $index=>$values) {
			echo "$index - ";
		}echo "<br>";
		
		// escrevendo resultado do SELECT
		foreach($result as $row) {
			foreach($row as $value){
				echo "$value - ";
			}
			echo "&nbsp;<a href='excluir.php?id=".$row["id"]."'>[Excluir]</a>&nbsp;";
			echo "&nbsp;<a href='alterar_formulario.php?id=".$row["id"]."'>[Alterar]</a>&nbsp;";
			echo "<br>";
		}
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
		die();
	}

	
	?>

	<br>
	<a href='cadastro_formulario.php'>Cadastrar</a>
	<br><br>
	<a href='buscar_formulario.php'>Buscar por Nome</a>
	<br><br>
	<a href='buscar_like_formulario.php'>Buscar por parte do nome</a>
	<br><br>
	<a href='buscar_detalhe_formulario.php'>Busca Detalhada</a>

</body>
</html>
