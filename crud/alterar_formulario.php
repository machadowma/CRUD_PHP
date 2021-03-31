<!doctype html public "-//W3C//DTD HTML 4.0 //EN">
<html>
<head>
<title>CRUD</title>
<meta charset="UTF-8">
</head>
<body>

	<?php
		include("banco_dados_conexao.php");	
	?>


	<h1>Alterar</h1>
	<form method="post" action="alterar_update.php">
	
		<?php
			try {
				$dbh = new PDO( $dsn );
				$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $dbh->prepare('SELECT id,nome,sobrenome,sexo from pessoa where id = ?');
				$stmt->bindParam(1, $id);
				$id = $_GET["id"];
				$stmt->execute();
				$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$dbh = null;
				echo "<br>ID: <input type='text' name='id' value='" . $result[0]["id"] . "' readonly>";
				echo "<br>Nome: <input type='text' name='nome' value='" . $result[0]["nome"] . "'>";
				echo "<br>Sobrenome: <input type='text' name='sobrenome' value='" . $result[0]["sobrenome"] . "'>";
				if($result[0]["sexo"]=='F')
					echo "<br>Sexo: <input type='radio' name='sexo' value='F' checked>Feminino <input type='radio' name='sexo' value='M'>Masculino";
				if($result[0]["sexo"]=='M')
					echo "<br>Sexo: <input type='radio' name='sexo' value='F'>Feminino <input type='radio' name='sexo' value='M' checked>Masculino";
			} catch (PDOException $e) {
				print "Error!: " . $e->getMessage() . "<br/><br><a href='index.php'>voltar</a>";
				die();
			}
		?>

	
	<br><input type="submit" name="alterar" value="Alterar">
	</form>
<br><br><a href="index.php">voltar</a>
</body>
</html>
