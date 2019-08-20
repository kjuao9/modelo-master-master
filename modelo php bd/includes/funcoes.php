<?php

  function bomdia() {
    $ola = date("H");
    if ( ($ola >=18 and $ola <=23) or ($ola >= 0 and $ola <3)){
      return "Boa Noite!";
    }
    else if ($ola >=3 and $ola <=11 ){
      return "Bom dia!";
    }
    else if ($ola >=12 and $ola <=17 ){
      return "Boa Tarde!";
    }
  }

  function maiusculo($string){
    $string = strtoupper ($string);
    $string = str_replace ("á","Á",$string);
    $string = str_replace ("é","É",$string);
    $string = str_replace ("í","Í",$string);
    $string = str_replace ("ó","Ó",$string);
    $string = str_replace ("ú","Ú",$string);
    $string = str_replace ("â","Â",$string);
    $string = str_replace ("ê","Ê",$string);
    $string = str_replace ("ô","Ô",$string);
    $string = str_replace ("î","Î",$string);
    $string = str_replace ("Û","U",$string);
    $string = str_replace ("ã","Ã",$string);
    $string = str_replace ("õ","Õ",$string);
    $string = str_replace ("ç","Ç",$string);
    $string = str_replace ("á","Á",$string);
    $string = str_replace ("à","À",$string);
    return $string;
  }

  function verificar_email($con, $email){
    $sql = "SELECT email FROM usuarios WHERE email = '$email'";
    $resultado = mysqli_query($con, $sql);
    $usuario = mysqli_fetch_assoc($resultado);
    
    if( isset($usuario["email"]) ){
        // print("e-mail encontrado");
        return false;
    }
    else{
      // print("e-mail não encontrado");
      return true;
    }
  }

  function listar_mensagens($con,$id_usuario)
  {
    $sql = "SELECT * From postagem 
    where id_usuario=$id_usuario
    ORDER by data_inclusao desc";
    $resultado = mysqli_query($con,$sql);
    if($resultado){
      $mensagens = array();
      while($linha = mysqli_fetch_assoc($resultado)){
        $mensagens[] =$linha;
      }
    }
    return $mensagens;
  };

  function verificar_se_seguidor($con, $codigo_usuario, $codigo_usuario_seguindo){
    //a consulta abaico verifica se os dois usuários já são amigos
    $sql = "SELECT * FROM usuarios_seguidores
    where id_usuario = '$codigo_usuario'
    and seguindo_id_usuario = $codigo_usuario_seguindo";
    $resultado = mysqli_query($con, $sql);
    $usuario_pesquisado = mysqli_fetch_assoc($resultado);
    //a linha abaixo verifica se retornou algo no banco de dados
    if ( isset($usuario_pesquisado['id_usuario_seguidor']) ){
      print "<span>
          <a href='procurar_pessoas_deixar_seguir.php?codigo=$codigo_usuario_seguindo'>Deixar_de_Seguir</a>
            </span>";
    }
    else{
      print "<span>
      <a href='procurar_pessoas_seguir.php?codigo=$codigo_usuario_seguindo'>Seguir</a>
        </span>";
    }
  }
  ?>
