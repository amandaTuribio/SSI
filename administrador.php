<!DOCTYPE html>
<?php
  session_start();
  if ($_SESSION['user'] == "") {
    header("Location: index.php");
  };
?>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <title>Injection</title>
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
  <link rel="stylesheet" href="css/custom-tcc.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
  <body>
    <nav class="navbar navbar-ifsp">
      <div class="navbar-brand">
        <img src="{{ asset('img/ifsp_logo.png') }}" width="40" height="53" alt="">
        <span class="text-header">Sistema de Gestão de Trabalhos de Conclusão de Curso</span>
      </div>
      <a href='doLogout.php' class="bnt">Sair</a>

    </nav>
    <div class="container">
      <br>
      <h1> Você esta logado!!</h1>
    </div>
  </div>
  <footer class="footer">
    <p class="text-footer">SQL Injection - IFSP</p>
    </footer
  </body>
</html>
