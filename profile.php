<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: signin.html');
    exit();
}

$usuario = $_SESSION['usuario'];

// Consulta SQL para obter a foto de perfil e outros dados
$sql = "SELECT photo, email, data_nascimento FROM usuarios WHERE usuario = ?";
$stmt = $conexao->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

$profile_photo = $row ? $row['photo'] : 'images/default_profile.jpg';
$email = $row['email'];
$data_nascimento = $row['data_nascimento'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil do Usuário - Cursos</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #74ebd5, #acb6e5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-container {
            background-color: white;
            width: 850px;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            box-sizing: border-box;
            position: relative;
        }

        .profile-photo img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 4px solid #74ebd5;
            transition: transform 0.3s ease;
        }

        .profile-photo img:hover {
            transform: scale(1.1);
        }

        .profile-info h1 {
            font-size: 28px;
            color: #333;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .profile-info p {
            color: #555;
            font-size: 18px;
            margin-bottom: 30px;
        }

        .tab {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .tab button {
            background-color: #74ebd5;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            cursor: pointer;
            color: white;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s ease;
            flex-grow: 1;
            margin: 0 5px;
        }

        .tab button.active {
            background-color: #00796b;
        }

        .tab button:hover {
            background-color: #5bbec9;
        }

        .tabcontent {
            display: none;
            animation: fadeEffect 0.3s;
            text-align: left;
            padding: 20px;
        }

        .tabcontent.active {
            display: block;
        }

        @keyframes fadeEffect {
            from {opacity: 0;}
            to {opacity: 1;}
        }

        .course-list {
            text-align: left;
            margin-top: 20px;
        }

        .course-item {
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }

        .course-item h3 {
            color: #00796b;
            margin: 0 0 5px 0;
            font-size: 20px;
        }

        .course-item p {
            color: #555;
            margin: 5px 0;
            font-size: 16px;
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }

        /* Estilos para os botões de ação */
        .action-buttons button,
        .action-buttons a {
            background-color: #00796b;
            color: white;
            border: none;
            padding: 12px 30px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }

        /* Estilo específico para o botão de sair */
        .btn-sair {
            background-color: #d32f2f; /* Vermelho */
        }

        .btn-sair:hover {
            background-color: #b71c1c; /* Vermelho mais escuro ao passar o mouse */
        }

        /* Alterar a cor do link para combinar com os botões */
        .action-buttons a {
            background-color: #00796b;
            color: white;
            text-decoration: none; /* Remove o sublinhado */
        }

        .action-buttons a:hover {
            background-color: #00574b;
        }

        .upload-section {
            margin-bottom: 30px;
        }

        .upload-label {
            background-color: #74ebd5;
            color: white;
            padding: 10px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            display: inline-block;
            margin-right: 10px;
        }

        .upload-label:hover {
            background-color: #5bbec9;
        }

        .upload-btn {
            background-color: #74ebd5;
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .upload-btn:hover {
            background-color: #5bbec9;
        }

        #upload {
            display: none;
        }

        /* Estilos para o ícone de engrenagem */
        .settings-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: #333;
            transition: color 0.3s ease;
        }

        .settings-icon:hover {
            color: #00796b;
        }

        /* Estilos para a área de dados pessoais */
        .personal-data {
            display: none;
            margin-top: 20px;
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 10px;
        }

        .personal-data h3 {
            margin-bottom: 10px;
            color: #00796b;
        }

        .personal-data p {
            color: #555;
            font-size: 16px;
            margin: 5px 0;
        }

        /* Media Queries para melhor ajuste em dispositivos menores */
        @media (max-width: 768px) {
            .profile-container {
                width: 90%;
            }

            .tab {
                flex-direction: column;
            }

            .tab button {
                margin: 10px 0;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-buttons button,
            .action-buttons a {
                margin-bottom: 10px;
                width: 100%;
            }
        }
        /* Estilos para o ícone de engrenagem */
        .gear-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 28px;
            cursor: pointer;
            color: #333;
            transition: color 0.3s ease;
        }

        /* Estilos para a barra lateral expansível */
        .personal-data-panel {
            position: fixed;
            top: 0;
            right: -300px; /* Escondida inicialmente */
            width: 300px;
            height: 100vh;
            background-color: #fff;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
            transition: right 0.3s ease; /* Animação de deslizamento */
            overflow-y: auto; /* Barra de rolagem vertical */
            padding: 20px;
            border-left: 2px solid #00796b;
        }

        /* Estilo para quando a barra lateral está aberta */
        .personal-data-panel.open {
            right: 0;
        }

        /* Título e parágrafos na barra lateral */
        .personal-data-panel h3 {
            font-size: 20px;
            color: #333;
            margin-bottom: 20px;
            border-bottom: 2px solid #00796b;
            padding-bottom: 10px;
        }

        .personal-data-panel p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        /* Botão de fechar a barra lateral */
        .personal-data-panel .close-btn {
            position: absolute;
            top: 10px;
            left: 10px;
            cursor: pointer;
            font-size: 20px;
            color: #ff6b6b;
        }

        /* Estilos personalizados para a barra de rolagem */
        .personal-data-panel::-webkit-scrollbar {
            width: 8px; /* Largura da barra de rolagem */
        }

        .personal-data-panel::-webkit-scrollbar-thumb {
            background-color: #74ebd5; /* Cor do "polegar" da barra de rolagem */
            border-radius: 10px;
        }

        .personal-data-panel::-webkit-scrollbar-track {
            background-color: #f1f1f1; /* Cor do fundo da barra de rolagem */
        }
        

    </style>
</head>
<body>
    <div class="profile-container">
        <!-- Ícone de engrenagem -->
        <div class="settings-icon" onclick="togglePersonalData()">⚙️</div>

        <!-- Foto do perfil -->
        <div class="profile-photo">
            <img src="<?php echo $profile_photo; ?>" alt="Foto do Usuário" id="userPhoto">
        </div>

        <!-- Formulário para upload de foto -->
        <div class="upload-section">
            <form action="upload_photo.php" method="post" enctype="multipart/form-data">
                <input type="file" name="photo" id="upload" accept="image/*">
                <label for="upload" class="upload-label">Carregar nova foto</label>
                <input type="submit" value="Atualizar Foto" class="upload-btn">
            </form>
        </div>

        <!-- Informações do usuário -->
        <div class="profile-info">
            <h1><?php echo htmlspecialchars($usuario); ?></h1>
            <p>Bem-vindo ao seu perfil, aqui verá seu progresso em nossa plataforma!</p>
        </div>

        <!-- Abas para navegação -->
        <div class="tab">
            <button class="tablinks active" onclick="openTab(event, 'CursosConcluidos')">Cursos Concluídos</button>
            <button class="tablinks" onclick="openTab(event, 'ProgressoAtual')">Progresso Atual</button>
            <button class="tablinks" onclick="openTab(event, 'Habilidades')">Habilidades</button>
        </div>

        <!-- Conteúdo da aba "Cursos Concluídos" -->
        <div id="CursosConcluidos" class="tabcontent active">
            <div class="course-list">
                <div class="course-item">
                    <h3>Introdução ao Marketing Digital</h3>
                    <p>Concluído em: 12/01/2024</p>
                </div>
                <div class="course-item">
                    <h3>SEO para Iniciantes</h3>
                    <p>Concluído em: 25/02/2024</p>
                </div>
            </div>
        </div>

        <!-- Conteúdo da aba "Progresso Atual" -->
        <div id="ProgressoAtual" class="tabcontent">
            <div class="course-list">
                <div class="course-item">
                    <h3>Curso de Redes Sociais Avançado</h3>
                    <p>Progresso: 75%</p>
                </div>
            </div>
        </div>

        <!-- Conteúdo da aba "Habilidades" -->
        <div id="Habilidades" class="tabcontent">
            <div class="course-list">
                <div class="course-item">
                    <h3>SEO e Marketing Digital</h3>
                    <p>Habilidade adquirida: 65%</p>
                </div>
            </div>
        </div>

        <!-- Botões de ação -->
        <div class="action-buttons">
            <a href="sistema.html">Ir para a tela inicial</a>
            <form action="logout.php" method="post">
            <button type="submit" class="btn-sair">Sair</button>
        </form>
</div>



        <!-- Dados pessoais do usuário -->
        <div class="personal-data" id="personalData">
            <h3>Dados Pessoais</h3>
            <p><strong>Nome de Usuário:</strong> <?php echo htmlspecialchars($usuario); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
            <p><strong>Data de Nascimento:</strong> <?php echo htmlspecialchars($data_nascimento); ?></p>
        </div>
        <!-- Painel lateral expansível para dados pessoais -->
        <div id="personalDataPanel" class="personal-data-panel">
            <span class="close-btn" onclick="togglePersonalData()">✖️</span>
            <h3>Dados Pessoais</h3>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Data de Nascimento:</strong> Não informado</p>
        </div>
    </div>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;

            // Oculta todos os conteúdos das abas
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
                tabcontent[i].classList.remove("active");
            }

            // Remove a classe "active" de todos os botões
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].classList.remove("active");
            }

            // Exibe a aba clicada e adiciona a classe "active"
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.classList.add("active");
        }

        // Inicializa a primeira aba como visível
        document.getElementById("CursosConcluidos").style.display = "block";

        // Função para alternar a exibição dos dados pessoais
        function togglePersonalData() {
            var personalData = document.getElementById("personalData");
            if (personalData.style.display === "none" || personalData.style.display === "") {
                personalData.style.display = "block";
            } else {
                personalData.style.display = "none";
            }
        }

        // Pré-visualização da foto antes do upload
        const uploadInput = document.getElementById('upload');
        const userPhoto = document.getElementById('userPhoto');

        uploadInput.addEventListener('change', function() {
            const reader = new FileReader();
            reader.onload = function(e) {
                userPhoto.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        });
        function togglePersonalData() {
            var panel = document.getElementById("personalDataPanel");
            panel.classList.toggle("open");
        }

    </script>
</body>
</html>
