<?php include 'Genericos/conecta.php'; ?>
<?php
    $tsql = "SELECT * FROM tb_sala";
    $dados   = sqlsrv_query($conn, $tsql);

    while($row = sqlsrv_fetch_array($dados, SQLSRV_FETCH_ASSOC)) {
        echo $row['nroID']."<br>";
    }
?>