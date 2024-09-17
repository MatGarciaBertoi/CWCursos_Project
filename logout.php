<?php
session_start();
session_destroy(); // Destroi a sessão
header('Location: signin.html'); // Redireciona para a página de login
exit();
?>
