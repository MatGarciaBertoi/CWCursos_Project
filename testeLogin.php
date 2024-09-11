<?php
// Verifica se o formulário de login foi submetido
if (isset($_POST['submit'])) {
    include_once('config.php'); // Inclui o arquivo de configuração com a conexão ao banco de dados

    // Obtém os dados de entrada do formulário
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    // Verifica se o usuário existe no banco de dados
    $query = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Se o usuário existir, verifica a senha
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica se a senha inserida corresponde ao hash armazenado no banco de dados
        if (password_verify($senha, $user['senha'])) {
            // Se a senha estiver correta, redireciona para a página sistema.html
            echo "<script>
                    alert('Login realizado com sucesso!');
                    window.location.href = 'sistema.html';
                    </script>";
        } else {
            // Se a senha estiver incorreta, exibe uma mensagem de erro
            echo "<script>alert('Senha incorreta!');</script>";
        }
    } else {
        // Se o usuário não for encontrado, exibe uma mensagem de erro
        echo "<script>alert('Usuário não encontrado!');</script>";
    }

    // Fecha as conexões
    $stmt->close();
    $conexao->close();
}
?>
