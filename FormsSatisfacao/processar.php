<?php
include 'conectar.php';

// Obter dados do formulário
$nome = $_POST['name'];
$email = $_POST['email'];
$experiencia = $_POST['experience'];
$experiencia_rating = $_POST['experience_rating'];
$navegacao = $_POST['navigation'];
$qualidade = $_POST['quality'];
$atendimento = $_POST['customer_service'];

// Tratar checkbox para cursos e motivações
$tipo_curso = implode(",", $_POST['course_type']);
$tipo_curso_outros = isset($_POST['course_type_other']) ? $_POST['course_type_other'] : '';
$motivacoes = implode(",", $_POST['motivations']);
$motivacoes_outros = isset($_POST['motivations_other']) ? $_POST['motivations_other'] : '';
$tema_especifico = $_POST['specific_theme'];
$recursos = implode(",", $_POST['resources']);
$recursos_outros = isset($_POST['resources_other']) ? $_POST['resources_other'] : '';
$sugestoes = $_POST['suggestions'];
$comentarios = $_POST['additional_comments'];
$atualizacoes = $_POST['updates'];
$contato = $_POST['contact'];

// Prepara e executa a query
$sql = "INSERT INTO respostas (nome, email, experiencia, experiencia_rating, navegacao, qualidade, atendimento, tipo_curso, tipo_curso_outros, motivacoes, motivacoes_outros, tema_especifico, recursos, recursos_outros, sugestoes, comentarios, atualizacoes, contato)
VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param(
    'ssssssssssssssssss',
    $nome, $email, $experiencia, $experiencia_rating, $navegacao, $qualidade, $atendimento, $tipo_curso, $tipo_curso_outros,
    $motivacoes, $motivacoes_outros, $tema_especifico, $recursos, $recursos_outros, $sugestoes, $comentarios, $atualizacoes, $contato
);

if ($stmt->execute()) {
    echo "Dados enviados com sucesso!";
} else {
    echo "Erro: " . $stmt->error;
}

// Fecha a conexão
$stmt->close();
$conn->close();
?>
