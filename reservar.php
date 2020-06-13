<?php include 'Genericos/conecta.php'; ?>

<?php 
if ((isset($_POST["Enviar"]) && !(empty($_POST["idUsuario"]) || empty($_POST["nroSala"]) || empty($_POST["Data"]) || empty($_POST["Hora"])))) {
    $sql="INSERT INTO tb_Reserva VALUES ('".$_POST["idUsuario"]."','".$_POST["nroSala"]."','".$_POST["Hora"]."','".$_POST["Data"]."')"; 
      $result = sqlsrv_query($conn, $sql);
    echo "<script type='text/javascript'>alert('Reserva cadastrada com sucesso!')</script>";
}else if (isset($_POST["Enviar"]) && (empty($_POST["idUsuario"]) || empty($_POST["nroSala"]) || empty($_POST["Data"]) || empty($_POST["Hora"]))) {
    echo "<script type='text/javascript'>alert('Falta dados!')</script>";
}
?>





<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Reservar</title>

  <!-- Stylesheets -->
  <link rel = "stylesheet" href = "style.css">
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  
  <!-- Ajax -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  
</head>

<body>

<div class="container">
  <div class="card border-0 shadow mt-4 mb-5 pb-5">
    <img src="logo.png" onclick="window.location.href='index.php'" class="rounded mx-auto logo mt-3" alt="logo">
    <h1 class="font-weight-light logo-text">Reservar Sala</h1>
    <form class="mx-5 px-5" method="POST">
      <div class="form-group">
        <label for="formUsuario">Usuário</label>
        <select class="form-control" id="formUsuario" name='idUsuario'>
        <?php
          $tsql = "SELECT nome, nroSocio FROM tb_Socio ORDER BY nome";
          $dados   = sqlsrv_query($conn, $tsql);

          while($row = sqlsrv_fetch_array($dados, SQLSRV_FETCH_ASSOC)) {
              ?><option value='<?php echo $row['nroSocio'];?>'><?php echo $row['nome'];?></option><?php
          }
        ?>
        </select>
      </div>
      <div class="form-group">
        <label for="formSala">Sala</label>
        <select class="form-control" id="formUsuario" name='nroSala'>
        <?php
          $tsql = "SELECT nroID FROM tb_Sala where tipo_sala = 1 ORDER BY nroID";
          $dados   = sqlsrv_query($conn, $tsql);

          while($row = sqlsrv_fetch_array($dados, SQLSRV_FETCH_ASSOC)) {
              ?><option value='<?php echo $row['nroID'];?>'>Sala <?php echo $row['nroID'];?></option><?php
          }
        ?>
        </select>
      </div>
      <div class="form-group">
        <label for="formData">Data</label>
        <input class="form-control" type="date" id="formData" name='Data'>
      </div>
      <div class="form-group">
        <label for="formHoraInicial">Hora</label>
        <input class="form-control" type="time" id="formHoraInicial" name='Hora'>
      </div>
      <!-- <div class="form-group">
        <label for="formHoraFinal">Hora final</label>
        <input class="form-control" type="time" id="formHoraFinal">
      </div>
      <div class="form-group">
        <label for="formObs">Observações</label>
        <textarea class="form-control" id="formObs" rows="3"></textarea>
      </div> -->
      <button type="submit" class="btn btn-primary" name='Enviar'>Enviar</button>
    </form>
  </div>
</div>

<div style="color: white;">Icons made by <a href="http://www.freepik.com/" style="color: hsla(0, 100%, 35%, 1)" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" style="color: hsla(0, 100%, 35%, 1)" title="Flaticon">www.flaticon.com</a></div>

<script>
  
</script>
  
</body>