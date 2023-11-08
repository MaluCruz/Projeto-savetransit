<?php
session_start(); // Inicia a sessão

// Função para destruir a sessão e redirecionar para "entrar.html"
function destruirSessao() {
    session_destroy();
    header("Location: entrar.html"); // Redireciona para a página "entrar.html"
    exit;
}

// Chama a função para destruir a sessão
destruirSessao();
?>
