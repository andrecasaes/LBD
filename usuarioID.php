<?php include 'Genericos/conecta.php'; ?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <title>Usuário ID</title>

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
    <h1 class="font-weight-light logo-text">Reservas do usuário <?php echo $_GET["nome"];?></h1>
    
    <input class="w-50 mx-auto mt-3 mb-5" type="text" id="myInput" onkeyup="myFunction()" placeholder="Procurar reserva...">
    
    <div id="reservas">
    <?php
      $tsql = "SELECT sala_alocada, CONVERT(nvarchar,dt_reserva,103) AS dt_reserva , CONVERT(nvarchar,hora,108) AS hora FROM tb_Reserva AS RE WHERE RE.nroSocio=".$_GET["nroSocio"];
      $dados   = sqlsrv_query($conn, $tsql);

      while($row = sqlsrv_fetch_array($dados, SQLSRV_FETCH_ASSOC)) {
          ?>
          <table class="table table-striped mx-auto mb-5" style="max-width: 90%;">
            <thead class="thead-dark">
              <tr>
                <th scope="col">Sala <?php echo $row['sala_alocada'];?></th>
                <th scope="col"> </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Dia</th>
                <td><?php echo $row['dt_reserva'];?></td>
              </tr>
              <tr>
                <th scope="row">Hora</th>
                <td><?php echo $row['hora'];?></td>
              </tr>
            </tbody>
          </table>
          <?php
      }
    ?>
    </div>
  </div>
</div>

<div style="color: white;">Icons made by <a href="http://www.freepik.com/" style="color: hsla(0, 100%, 35%, 1)" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" style="color: hsla(0, 100%, 35%, 1)" title="Flaticon">www.flaticon.com</a></div>

<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('myInput');
  filter = input.value.toUpperCase();
  table = document.getElementById("reservas");
  tables = table.getElementsByTagName('table');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < tables.length; i++) {
    head = tables[i].getElementsByTagName("th")[0];
    txtValue = head.textContent || head.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      tables[i].style.display = "";
    } else {
      tables[i].style.display = "none";
    }
  }
}
</script>
  
</body>