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
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(135deg, #f0f4f8, #d9e3f0);
    color: #333;
}

header {
    background-color: #002d72;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    position: relative;
}

header .logo img {
    height: 60px;
    width: auto;
    border-radius: 50%;
    transition: transform 0.3s ease;
}

header .logo img:hover {
    transform: rotate(360deg);
}

header nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
}

header nav ul li {
    margin: 0 20px;
}

header nav ul li a {
    color: #fff;
    text-decoration: none;
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

header nav ul li a:hover {
    background-color: #004abf;
}

main {
    padding: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.welcome {
    background-color: #ffffff;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    text-align: center;
    animation: fadeIn 1s ease-in-out;
}

.welcome h1 {
    margin-top: 0;
    color: #002d72;
}

.content {
    background-color: #ffffff;
    padding: 30px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    animation: fadeIn 1.2s ease-in-out;
}

.courses {
    display: flex;
    flex-wrap: wrap;
}

.course {
    background-color: #f9f9f9;
    padding: 20px;
    margin: 10px;
    border-radius: 10px;
    flex: 1 1 calc(33.333% - 40px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.course:hover {
    transform: translateY(-10px);
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
}

.course h3 {
    margin-top: 0;
    color: #002d72;
}

.course img {
    width: 100%;
    border-radius: 10px;
    margin-bottom: 10px;
}

.course a {
    display: inline-block;
    margin-top: 15px;
    color: #002d72;
    text-decoration: none;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #e0ebff;
    transition: background-color 0.3s ease;
}

.course a:hover {
    background-color: #c2d6ff;
}

footer {
    background-color: #002d72;
    color: #fff;
    text-align: center;
    padding: 15px 0;
    position: fixed;
    width: 100%;
    bottom: 0;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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
                    <img src="images/seoavançado.png" alt="Imagem do curso SEO">
                    <p>Aprenda as melhores práticas de otimização para motores de busca.</p>
                    <a href="abacursos.html">Acessar</a>
                </div>
                <div class="course">
                    <h3>Curso de Marketing de Redes Sociais</h3>
                    <img src="images/cursodeMidiasDigitais_curso.png" alt="Imagem do curso de Marketing de Redes Sociais">
                    <p>Crie conteúdo que engaja e converte.</p>
                    <a href="abacursos.html">Acessar</a>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    const courses = document.querySelectorAll('.course');

    courses.forEach(course => {
        course.addEventListener('mouseover', function () {
            this.style.transform = 'scale(1.05)';
        });

        course.addEventListener('mouseout', function () {
            this.style.transform = 'scale(1)';
        });
    });

    const userGreeting = document.querySelector('.welcome h1');
    userGreeting.classList.add('animate__animated', 'animate__fadeInDown');
});

    </script>
    <footer>
        <p>&copy; 2024 CW CURSOS. Aqui seu conhecimento é prioridade.</p>
    </footer>
</body>
</html>
