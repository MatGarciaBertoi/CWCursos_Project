<?php
session_start();
include_once('config.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: signin.html'); // Redireciona para a página de login se não estiver logado
    exit();
}

$usuario = $_SESSION['usuario']; // Recupera o nome do usuário
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Aluno</title>
    <style>
        /* Estilos gerais para o corpo da página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #000;
        }

        header {
    background-color: #003399;
    color: #fff;
    display: flex;
    justify-content: center; /* Centraliza os itens de navegação */
    align-items: center;
    padding: 20px 20px; /* Aumenta o padding para expandir o tamanho vertical */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: relative; /* Permite o uso de position: absolute na logo */
    height: 40px; /* Define uma altura fixa para o cabeçalho */
}

header .logo {
    position: absolute; /* Posiciona a logo de forma absoluta */
    left: 20px; /* Define a logo no canto esquerdo */
    top: 50%;
    transform: translateY(-50%); /* Centraliza verticalmente a logo */
}

header nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center; /* Centraliza os links dentro da navegação */
}

header nav ul li {
    margin: 0 20px; /* Aumenta o espaçamento entre os itens */
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: bold;
}

header nav ul li a:hover {
    text-decoration: underline;
}


        header .logo img {
            height: 50px;
            width: auto;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        main {
            padding: 20px;
        }

        .welcome {
            background-color: #fff;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }

        .welcome h1 {
            margin-top: 0;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .courses {
            display: flex;
            flex-wrap: wrap;
        }

        .course {
            background-color: #f9f9f9;
            padding: 10px;
            margin: 10px;
            border-radius: 5px;
            flex: 1 1 calc(33.333% - 40px);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .course h3 {
            margin-top: 0;
        }

        .course a {
            display: inline-block;
            margin-top: 10px;
            color: #003399;
            text-decoration: none;
        }

        .course a:hover {
            text-decoration: underline;
        }

        footer {
            background-color: #003399;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logotipocw.png" alt="Logo CW Cursos">
        </div>
        <nav>
            <ul>
                <li><a href="abacursos.html">Cursos</a></li>
                <li><a href="abatrofeus.html">Galeria de certificados</a></li>
                <li><a href="index.html">Suporte</a></li>
                <li><a href="profile.php">Perfil</a></li>
                <li><a href="sistema.html">Sair</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section class="welcome">
            <h1>Bem-vindo, <?php echo htmlspecialchars($usuario); ?>!</h1> <!-- Mostra o nome do usuário logado -->
            <p>Aqui você encontrará todas as informações sobre seus cursos, materiais e suporte.</p>
        </section>
        <section class="content">
            <h2>Seus Cursos</h2>
            <div class="courses">
                <div class="course">
                    <h3>SEO</h3>
                    <img src="" alt="Imagem do curso SEO">
                    <p>Aprenda as melhores práticas de otimização para motores de busca.</p>
                    <a href="#">Acessar</a>
                </div>
                <div class="course">
                    <h3>Curso de Marketing de Redes Sociais</h3>
                    <img src="" alt="Imagem do curso de Marketing de Redes Sociais">
                    <p>Crie conteúdo que engaja e converte.</p>
                    <a href="#">Acessar</a>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 CW CURSOS. Aqui seu conhecimento é prioridade.</p>
    </footer>
</body>
</html>
