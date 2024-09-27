<?php
$servidor = "localhost";
$usuario = "root"; // Seu usuário do MySQL
$senha = ""; // Sua senha do MySQL
$dbname = "cadastro_professores_administradores"; // O nome do banco de dados

// Cria a conexão
$conexao = new mysqli($servidor, $usuario, $senha, $dbname);

// Verifica a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}
?>
