<?php
include_once('config.php'); // Inclui o arquivo de configuração do banco de dados

if(isset($_POST["submit"]) && !empty($_POST['usuario']) && !empty($_POST['senha'])) { // Verifica se o formulário foi enviado e se os campos de usuário e senha não estão vazios

    $usuario = $_POST['usuario'];// Obtém o valor do campo de usuário do formulário
    $senha = $_POST['senha']; // Obtém o valor do campo de senha do formulário

    echo "Usuário: " . $usuario . "<br>"; // Exibe o usuário para depuração
    echo "Senha: " . $senha . "<br>"; // Exibe a senha para depuração

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'"; // Cria uma consulta SQL para verificar as credenciais do usuário

    echo "SQL: " . $sql . "<br>"; // Exibe a consulta SQL para depuração

    $result = $conexao->query($sql);
    // Executa a consulta SQL no banco de dados

    if($result) {
        // Verifica se a consulta foi bem-sucedida

        if($result->num_rows > 0) {
            // Verifica se foram encontradas linhas correspondentes no banco de dados

            // Login bem-sucedido, redirecionar para a página de sistema
            header("Location: sistema.html");
            exit();
        } else {
            // Login falhou, redirecionar para a página de login com mensagem de erro
            header("Location: signin.html?error=invalid");
            exit();
        }
    } else {
        // Erro na consulta SQL, exibe mensagem de erro
        echo "Erro na consulta SQL: " . $conexao->error;
    }
} else {
    // Dados de login não foram enviados corretamente, redirecionar para a página de login com mensagem de erro
    header('Location: signin.html?error=missing');
    exit();
}
?>
