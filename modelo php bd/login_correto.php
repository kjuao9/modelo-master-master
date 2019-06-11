<!DOCTYPE html>
	<?php
		session_start();
		if ( !isset($_SESSION["codigo"]) ){
			header("location:index.php?erro=2");
		}
		$id_usuario = $_SESSION["codigo"];
	?>
<html lang="pt-br">
<head>
	<meta charset="utf-8"/>
	<meta name="author" content="Professor"/>
	<meta name="description" content="Descrição"/>
	<meta name="keywords" content="Palavras, chaves"/>
	<title>PHP com BD</title>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
</head>
<body>

	<?php include "includes/menu-login.php" ?>

	<div id="div-area-principal">
		<div id="div-pessoal" class="borda-arredondada">
			<span class="negrito-maior"><?php print$_SESSION["nome"]?></span>
			<br/>
			<span class="italico"><?php print$_SESSION["email"]?></span> <br/><br/>
			<hr/><br/>
				<table>
					<tr>
						<td width="100px" >TWEETS <br/> 0</td>
						<td width="100px">SEGUIDORES <br/> 0</td>
					</tr>
				</table>
		</div>
		<div id="div-postagem" class="borda-arredondada">
			<form method="post" action="">
				<p class="centralizar">
					<textarea id="mensagem" name="mensagem" maxlength="140" cols="50" rows="4"
					placeholder="<?php print "O que você vai postar hoje?"?>"></textarea>
				</p>
				<input type="submit" value="Postar"/>
				<input type="reset" value="Cancelar"/>
			</form>
			<?php
			//código PHP aqui!

			?>
		</div>
		<div id="div-procurar-pessoa" class="borda-arredondada">
			<br/>
			<a href="procurar_pessoas.php">Procurar pessoas</a>
			<br/><br/>
		</div>
		<div id="postagem" class="clear">
			<?php print"Hoje é ".date("d/M/Y").", horário atual: ".date("H:i");?>
		</div>
	</div> <!-- Div Área principal -->
</body>
</html>
