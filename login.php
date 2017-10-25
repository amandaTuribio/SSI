<?php
  session_start();

  $link = mysqli_connect('localhost',  'root', '', 'ssi');
  if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
  }

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  //$login = addslashes($_POST['login']);
  //$senha = addslashes($_POST['senha']);

  //$login = preg_replace('/[^[:alnum:]_.-]/', '', $_POST['login']);
  //$senha =  preg_replace('/[^[:alnum:]_.-]/', '', $_POST['senha']);

  //$login = mysqli_escape_string($link, $_POST['login']);
  //$senha = mysqli_escape_string($link, $_POST['senha']);


  //$sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
  //$result = mysqli_query($link,$sql);
  //$user = mysqli_fetch_array($result,MYSQLI_ASSOC);
  //$_SESSION['sql'] = $sql;


if ($stmt = $link->prepare("SELECT * FROM usuarios WHERE login = ? AND senha = ?")) {
    $stmt->bind_param("ss", $login, $senha);
    $stmt->execute();
    $stmt->bind_result($user,$senha,$id);
    $stmt->fetch();
    var_dump($stmt);
}


  $_SESSION['user'] = $user;
  if ($user) {
      header("Location: administrador.php");
  }else{
    $_SESSION['msg'] = "<p style='margin: 10px; color: red; font-weight: bold;'>Login Errado !</p>";
    header("Location: index.php");
  }

?>
