<!DOCTYPE html>
<?php
session_start();
if ( !isset($_SESSION["codigo"])){
	header("location:index.php?erro=2");
}
include_once "conexao.php";
$con = conecta_mysql();
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
	<div id="area-principal">
		<div id="postagem">
			<form method = "post" action="">
                <fieldset>
                <label>Código do usuario</label>
                <input type="text" name="codigo" id="codigo" disabled
					value="<?php print$_SESSION["codigo"]?>"/>
					<br/>
					<label>E-mail do usuario</label>
					<input type="text" name="email" id="email"
					value="<?php print$_SESSION["email"]?>"/>
					<br/>
					<input type="submit" value="Alterar">
					<input type="reset" value="Cancelar">
                </fieldset>
			</form>
		</div>
		<?php
		//código PHP aqui!
		if(isset($_POST["email"])){
            $email = $_POST["email"];
            $codigo = $_SESSION["codigo"];

            function verificar_email($con, $email){
                $sql = "SELECT email FROM usuarios WHERE email = '$email'";
                $resultado = mysqli_query($con, $sql);
                $usuario = mysqli_fetch_assoc($resultado);
                
                if( isset($usuario["email"]) ){
                    print"<script>alert('O E-mail já existe. Escolha outro')</script>";
                    return false;
                }
                else{
                    $sql = "UPDATE usuarios SET email='$email' WHERE codigo=$codigo";
                    $resultado = mysqli_query($con, $sql);
                    if($resultado){
                        print "E-mail alterado";
                        $_SESSION["email"] = $email;
                        
                    }
                  return true;
                }
              }            
        }
		?>
	</div>
</body>
</html>
