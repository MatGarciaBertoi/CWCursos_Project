<?php
$servername = "localhost";
$username = "root"; // Altere para seu usuário do MySQL
$password = ""; // Altere para sua senha do MySQL
$dbname = "cursos_online";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
