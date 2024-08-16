<?php

$dbHost = 'LocalHost';// Define o hostname do servidor de banco de dados como 'LocalHost'
$dbUsername = 'root';// Define o nome de usuário do banco de dados como 'root'
$dbPassword = '';// Define a senha do banco de dados como uma string vazia
$dbName = 'teladecadastro';// Define o nome do banco de dados como 'teladecadastro'
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);// Cria uma nova conexão com o banco de dados usando as credenciais fornecidas

if($conexao->connect_errno) {
    // Verifica se houve algum erro ao conectar ao banco de dados

    echo "Erro";
    // Exibe a mensagem "Erro" se houve um erro de conexão
} else {
    // Se não houve erro de conexão

    echo "Conexão efetuada com sucesso"; // Exibe a mensagem "Conexão efetuada com sucesso"
}

?>
