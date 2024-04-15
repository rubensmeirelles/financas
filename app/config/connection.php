<?php

$host = HOST;
$user = USER;
$password = PASS;
$dbname = DBNAME;
$port = PORT;

$conn = mysqli_connect($host .":" . $port, $user, $password, $dbname);

if($conn){
    // echo "Conexão realizada!";
} else {
    die('<div class="d-flex justify-content-center align-items-center flex-column" style="margin-top: 300px; color: red"><div>Erro 002: erro de conexão!!!<br>Em caso de dúvida reporte o erro ao: <a href="mailto:'.EMAIL.'">administrador</a> '.'</div></div>');
};

mysqli_set_charset($conn, "utf8mb4");

?>
