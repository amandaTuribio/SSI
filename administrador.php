<!DOCTYPE html>
<?php
  session_start(); // Inicia a sessão
  unset($_SESSION['tentativas']);
  unset($_SESSION['msgip']);
  unset($_SESSION['IPATACK']);
?>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width ,initial-scale=1">
    <title>Injection</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="_CSS/boot.css">
    <link rel="stylesheet" href="_CSS/estilo.css">
    <?php
      session_start(); // Inicia a sessão

      $L = $_POST['login'];
      $S = $_POST['senha'];

      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', 'inscrito');
      define('DB_DATABASE', 'LAB');
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

      $sql = "SELECT * FROM IP"; //1' or '1' = '1
      $result = mysqli_query($db,$sql);
      ?>
  </head>
  <body style="background-color: #f1f1f1;">
    <div class="container bg-preto">
      <div class="content">
          <h1 style="font-size: 2em;">Bem-vindo, Administrador !</h1>
      </div>
        <div class="clear"></div>
    </div>
    <div class="container main_info">
      <div class="content">
        <div style="text-align: center;">
          <h1 style="margin: 10px;">ENDEREÇOS DE IPS COM NUMERO DE TENTATIVAS EXCEDIDAS.</h1>
        </div>
        <div class="invasor" style="width: 100%; border: 1px solid #ccc; border-bottom: none; background-color: #fff; text-align: left;">
          <div style="border-bottom: 1px solid #ccc;">
            <span style="width: 15%; margin-right: 3%; margin: 0 5px; border-right: 1px solid #ccc; font-weight: bold; font-size: 1.5em; display: inline-block;">NUMERO</span>
            <span style="width: 15%; margin-right: 3%; margin: 0 5px; border-right: 1px solid #ccc; font-weight: bold; font-size: 1.5em; display: inline-block;">DATA</span>
            <span style="width: 15%; margin-right: 3%; margin: 0 5px; border-right: 1px solid #ccc;font-weight: bold; font-size: 1.5em; display: inline-block;">IP</span>
            <span style="width: 15%; margin-right: 3%; margin: 0 5px; border-right: 1px solid #ccc;font-weight: bold; font-size: 1.5em; display: inline-block;">SO</span>
            <span style="width: 15%; margin-right: 3%; margin: 0 5px; font-weight: bold; font-size: 1.5em; display: inline-block;">NAVEGADOR</span>
          </div>

          <?php while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {?>
            <div style="border-bottom: 1px solid #ccc; height: 50px;">
              <span style="width: 15%;height: 50px; margin-right: 3%;padding: 10px 0; margin: 0 5px; border-right: 1px solid #ccc; font-size: 1em; display: inline-block;"><?php echo $row['ID'] ?></span>
              <span style="width: 15%;height: 50px; margin-right: 3%;padding: 10px 0; margin: 0 5px; border-right: 1px solid #ccc; font-size: 1em; display: inline-block;"><?php echo $row['data'] ?></span>
              <span style="width: 15%;height: 50px; margin-right: 3%;padding: 10px 0; margin: 0 5px; border-right: 1px solid #ccc; font-size: 1em; display: inline-block;"><?php echo $row['ip'] ?></span>
              <span style="width: 15%;height: 50px; margin-right: 3%; padding: 10px 0; margin: 0 5px; border-right: 1px solid #ccc; font-size: 1em; display: inline-block;"><?php echo $row['so'] ?></span>
              <span style="width: 15%;height: 50px; margin-right: 3%;padding: 10px 0; margin: 0 5px; font-size: 1em; display: inline-block overflow: hidden;"><?php echo $row['navegador'] ?></span>
            </div>
          <?php } ?>

        </div>
        <div style="clear:both;"></div>
      </div>
    </div>
    <footer class="container main_footer main_falha">
      <div class="content">
        <h1>FALHA 1: <span style="color: #fff;">Injection</span></h1>
        <h1>Exercício: <span style="color: #fff;">Obtenha acesso a área Administrativa.</span></h1>
        <p style="text-align: right;"><b>Canal: </b><b style="color: #e74c3c;">Fenix</b><b style="color: #f1c40f;">Sec</b></p>
        <div class="clear"></div>
      </div>
    </footer>
  </body>
</html>
