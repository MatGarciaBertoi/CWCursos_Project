<?php
// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {
    include_once('config.php'); // Inclui o arquivo de configuração

    // Obtém os dados do formulário
    $nome = ($_POST['nome']);
    $usuario = ($_POST['usuario']);
    $senha = ($_POST['senha']);
    $confisenha = ($_POST['confirmSenha']);

    // Verificação se as senhas coincidem
    if ($senha !== $confisenha) {
        echo "As senhas não coincidem!"; // Exibe uma mensagem de erro
        exit; // Termina o script
    }

    // Insere os dados no banco de dados
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, usuario, senha, confsenha) VALUES ('$nome', '$usuario', '$senha', '$confisenha')");
}
?>

<!DOCTYPE html>
<html lang="pt-BR"> 
<head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> 
    
</head>
<body>
    <style>
        /* Importa a fonte Roboto do Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

        /* Reseta as margens e padding, define a fonte padrão */
        * {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif;
        }

        /* Estilo para o corpo da página */
        body {
            background-image: url(images/cadastro99.jpg); /* Imagem de fundo */
            background-repeat: no-repeat; /* Não repetir a imagem */
            background-size: cover; /* Cobre toda a área */
            background-attachment: fixed; /* Fixa a imagem no fundo */
        }

        /* Container principal */
        .container {
            display: flex; /* Flexbox */
            justify-content: center; /* Centraliza horizontalmente */
            width: 100%; /* Largura total */
            margin-top: 100px; /* Margem superior */
        }

        /* Cartão de cadastro */
        .card {
            background-color: #ffffff80; /* Fundo branco semitransparente */
            padding: 30px; /* Espaçamento interno */
            border-radius: 4%; /* Bordas arredondadas */
            box-shadow: 3px 3px 1px 0px #00000060; /* Sombra */
            width: 300px; /* Largura fixa */
        }

        /* Estilo para o título */
        h1 {
            text-align: center; /* Centraliza o texto */
            margin-bottom: 20px; /* Margem inferior */
            color: #272262; /* Cor do texto */
        }

        /* Estilo para os inputs dentro do label-float */
        .label-float input {
            width: 100%; /* Largura total */
            padding: 5px 5px; /* Espaçamento interno */
            display: inline-block; /* Exibição em linha */
            border: 0; /* Remove borda */
            border-bottom: 2px solid #272262; /* Borda inferior */
            background-color: transparent; /* Fundo transparente */
            outline: none; /* Remove outline */
            min-width: 180px; /* Largura mínima */
            font-size: 16px; /* Tamanho da fonte */
            transition: all .3s ease-out; /* Transição suave */
            border-radius: 0; /* Remove bordas arredondadas */
        }

        /* Container para os inputs e labels flutuantes */
        .label-float {
            position: relative; /* Posicionamento relativo */
            padding-top: 13px; /* Espaçamento superior */
            margin-top: 5%; /* Margem superior */
            margin-bottom: 5%; /* Margem inferior */
        }

        /* Estilo para os inputs focados */
        .label-float input:focus {
            border-bottom: 2px solid #4038a0; /* Borda inferior quando focado */
        }

        /* Estilo para os labels */
        .label-float label {
            color: #272262; /* Cor do texto */
            pointer-events: none; /* Desabilita eventos do mouse */
            position: absolute; /* Posicionamento absoluto */
            top: 0; /* Alinha ao topo */
            left: 0; /* Alinha à esquerda */
            margin-top: 13px; /* Margem superior */
            transition: all .3s ease-out; /* Transição suave */
        }

        /* Estilo para labels quando o input está focado ou preenchido */
        .label-float input:focus + label,
        .label-float input:valid + label {
            font-size: 13px; /* Tamanho da fonte */
            margin-top: 0; /* Remove margem superior */
            color: #4038a0; /* Cor do texto */
        }

        /* Estilo para o botão de submit */
        button {
            background-color: transparent; /* Fundo transparente */
            border-color: #272262; /* Cor da borda */
            color: #272262; /* Cor do texto */
            padding: 7px; /* Espaçamento interno */
            font-weight: bold; /* Texto em negrito */
            font-size: 12pt; /* Tamanho da fonte */
            margin-top: 20px; /* Margem superior */
            border-radius: 4px; /* Bordas arredondadas */
            cursor: pointer; /* Cursor de ponteiro */
            outline: none; /* Remove outline */
            transition: all .4s ease-out; /* Transição suave */
        }

        /* Estilo para o botão de submit quando o mouse está sobre ele */
        button:hover {
            background-color: #272262; /* Fundo azul */
            color: #fff; /* Cor do texto */
        }

        /* Container para centralizar conteúdo */
        .justify-center {
            display: flex; /* Flexbox */
            justify-content: center; /* Centraliza horizontalmente */
        }

        /* Estilo para o ícone de olho */
        .fa-eye {
            position: absolute; /* Posicionamento absoluto */
            top: 13px; /* Alinha ao topo */
            right: 10px; /* Alinha à direita */
            cursor: pointer; /* Cursor de ponteiro */
            color: #272262; /* Cor do ícone */
        }

        /* Estilo para mensagens de erro */
        #msgError {
            text-align: center; /* Centraliza o texto */
            color: #ff0000; /* Cor do texto */
            background-color: #ffbbbb; /* Fundo */
            padding: 10px; /* Espaçamento interno */
            border-radius: 4px; /* Bordas arredondadas */
            display: none; /* Esconde por padrão */
        }

        /* Estilo para mensagens de sucesso */
        #msgSuccess {
            text-align: center; /* Centraliza o texto */
            color: #00bb00; /* Cor do texto */
            background-color: #bbffbe; /* Fundo */
            padding: 10px; /* Espaçamento interno */
            border-radius: 4px; /* Bordas arredondadas */
            display: none; /* Esconde por padrão */
        }
    </style>

    <!-- Link para voltar à página inicial -->
    <a href="home.html">Voltar</a>
    
    <!-- Container principal -->
    <div class="container">
        <form action="signup.php" method="POST"> <!-- Formulário de cadastro -->
            <div class="card">
                <h1>Cadastrar</h1> <!-- Título do formulário -->

                <div id="msgError"></div> <!-- Mensagem de erro -->
                <div id="msgSuccess"></div> <!-- Mensagem de sucesso -->

                <!-- Campo de nome com label flutuante -->
                <div class="label-float">
                    <input type="text" name="nome" id="nome" placeholder=" " required /> 
                    <label id="labelNome" for="nome">Nome</label>
                </div>

                <!-- Campo de usuário com label flutuante -->
                <div class="label-float">
                    <input type="text" name="usuario" id="usuario" placeholder=" " required /> 
                    <label id="labelUsuario" for="usuario">Usuario</label>
                </div>

                <!-- Campo de senha com label flutuante -->
                <div class="label-float">
                    <input type="password" name="senha" id="senha" placeholder=" " required /> 
                    <label id="labelSenha" for="senha">Senha</label>
                    <i id="verSenha" class="fa fa-eye" aria-hidden="true"></i> <!-- Ícone de olho -->
                </div>

                <!-- Campo de confirmação de senha com label flutuante -->
                <div class="label-float">
                    <input type="password" name="confirmSenha" id="confirmSenha" placeholder=" " required /> 
                    <label id="labelConfirmSenha" for="confirmSenha">Confirmar Senha</label>
                    <i id="verConfirmSenha" class="fa fa-eye" aria-hidden="true"></i> <!-- Ícone de olho -->
                </div>

                <!-- Botão de submit centralizado -->
                <div class="justify-center">
                    <button type="submit" name="submit">Cadastrar</button> 
                </div>
            </div>
        </form> 
    </div>
</body>
</html>
