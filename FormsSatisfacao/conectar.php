<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "cursos_online"; //nome colocado no banco de dados, favor importarem e colocar mesmo nome

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
