<?php
  session_start(); // Inicia a sessão

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  //$login = mysql_escape_string($_POST['login']);
  //$senha = mysql_escape_string($_POST['senha']);

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root'); //MUDE DE ACORDO COM SEU USUARIO
  define('DB_PASSWORD', ''); //MUDE DE ACORDO COM SUA SENHA
  define('DB_DATABASE', 'SSI');
  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

  $sql = "SELECT * FROM usuario WHERE
   = '$login' AND senha = '$S'"; //1' or '1' = '1
  $result = mysqli_query($db,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

  if ($row) {
    header("Location: administrador.php");
  }else{
    $_SESSION['msg'] = "Erro! Login ou Senha incorretos!";
    header("Location: index.php");
  }
?>
