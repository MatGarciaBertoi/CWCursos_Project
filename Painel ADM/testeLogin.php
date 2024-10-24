<?php
session_start();
include_once('config.php');

if (isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $tipoUsuario = $_POST['tipoUsuario']; // Tipo de usuário (professor ou administrador)

    // Define a tabela com base no tipo de usuário
    if ($tipoUsuario === 'professor') {
        $tabela = 'professores';
    } else if ($tipoUsuario === 'administrador') {
        $tabela = 'administradores';
    } else {
        echo "<script>alert('Tipo de usuário inválido!');</script>";
        exit;
    }

    // Verifica se o usuário existe na tabela correta
    $query = "SELECT * FROM $tabela WHERE usuario = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verifica a senha
        if (password_verify($senha, $row['senha'])) {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['tipoUsuario'] = $tipoUsuario;
            header("Location: home.html");
        } else {
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        echo "<script>alert('Usuário não encontrado!');</script>";
    }

    $stmt->close();
    $conexao->close();
}
?>
