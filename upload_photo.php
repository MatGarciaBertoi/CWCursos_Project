<?php
session_start();
include_once('config.php'); // Conexão com o banco de dados

if (isset($_FILES['photo']) && isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    // Verifica se a imagem foi enviada sem erros
    if ($_FILES['photo']['error'] == 0) {
        $fileTmpPath = $_FILES['photo']['tmp_name'];
        $fileName = $_FILES['photo']['name'];
        $fileSize = $_FILES['photo']['size'];
        $fileType = $_FILES['photo']['type'];

        // Define o diretório de upload (caminho absoluto)
        $uploadDir = __DIR__ . '/uploads/';
        $fileDestPath = $uploadDir . $fileName;

        // Verifica se o diretório existe, se não, cria o diretório
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Tenta mover o arquivo
        if (move_uploaded_file($fileTmpPath, $fileDestPath)) {
            echo "Arquivo movido com sucesso para: " . $fileDestPath;
            
            // Atualiza o caminho da foto no banco de dados
            $relativePath = 'uploads/' . $fileName;  // Caminho relativo para exibição
            $updatePhotoQuery = "UPDATE usuarios SET photo = ? WHERE usuario = ?";
            $stmt = $conexao->prepare($updatePhotoQuery);
            $stmt->bind_param("ss", $relativePath, $usuario);
            $stmt->execute();
            $stmt->close();

            // Atualiza a sessão com o novo caminho da foto
            $_SESSION['profile_photo'] = $relativePath;

            // Redireciona de volta para o perfil
            header('Location: profile.php');
            exit();
        } else {
            echo "Erro ao mover o arquivo.";
        }
    } else {
        echo "Erro no upload da imagem.";
    }
}
?>
