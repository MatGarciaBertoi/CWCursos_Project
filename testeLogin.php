<?php
session_start(); // Inicia a sessão
include_once('config.php'); // Inclui o arquivo de configuração

// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {
    $usuario = $_POST['usuario']; // Nome de usuário
    $email = $_POST['email']; // Email
    $senha = $_POST['senha'];

    // Prepara a consulta para verificar se o usuário e o email existem
    $loginQuery = "SELECT * FROM usuarios WHERE usuario = ? AND email = ?";
    $stmt = $conexao->prepare($loginQuery);
    $stmt->bind_param("ss", $usuario, $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verifica se o usuário foi encontrado
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica se a senha está correta
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario'] = $user['usuario']; // Define a sessão do usuário
            header('Location: profile.php'); // Redireciona para o perfil
            exit();
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        echo "<script>alert('Usuário ou e-mail não encontrados!');</script>";
    }

    // Fecha a conexão
    $stmt->close();
    $conexao->close();
}
?>
