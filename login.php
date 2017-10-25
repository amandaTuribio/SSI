<?php
  session_start();

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  //$login = mysqli_escape_string($_POST['login']);
  //$senha = mysqli_escape_string($_POST['senha']);

  $link = mysqli_connect('localhost',  'root', '', 'ssi');
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
  $result = mysqli_query($link,$sql);
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $_SESSION['user'] = $row['login'];

  if ($row) {
      header("Location: administrador.php");
  }else{
    $_SESSION['msg'] = "<p style='margin: 10px; color: red; font-weight: bold;'>Login Errado !</p>";
    header("Location: index.php");
  }

?>
