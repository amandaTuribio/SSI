<?php
session_start();
?>

<!DOCTYPE html>
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
      <span class="text-header">SQL Injection - IFSP</span>
    </div>
  </nav>
  <div class="container">
    <br>
    <form action="login.php" method="post">
      <div class="imgcontainer">
        <img src="img/ifsp_logo.png" alt="Avatar" class="avatar">
      </div>
      <label>USUARIO</label>
      <input type="text" name="login" value="">
      <label>SENHA</label>
      <input type="password" name="senha" value="">
      <?php if (!empty($_SESSION['msg'])) { ?>
        <div>
          <h6 style='margin: 5px; color: black; font-weight: bold;'><?php
          echo $_SESSION['msg'];
          unset($_SESSION['msg']);
          ?></h6>
        </div>
      <?php } ?>
      <?php if (!empty($_SESSION['sql'])) { ?>
        <div>
          <h6 style='margin: 5px; color: black; font-weight: bold;'><?php
          echo $_SESSION['sql'];
          unset($_SESSION['sql']);
          ?></h6>
        </div>
      <?php } ?>
      <button type="submit">Login</button>
    </form>
  </div>
</div>
<footer class="footer">
  <p class="text-footer">SQL Injection - IFSP</p>
  </footer
</body>
</html>
