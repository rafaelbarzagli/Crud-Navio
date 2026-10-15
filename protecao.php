<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// tempo limite: 10 minutos (600 segundos)
$tempo_limite = 600;

if (isset($_SESSION['ultimo_acesso'])) {
    if (time() - $_SESSION['ultimo_acesso'] > $tempo_limite) {
        session_destroy();
        session_start();
        $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
        header("Location: login.php");
        exit();
    }
}

// atualiza tempo
$_SESSION['ultimo_acesso'] = time();

if (empty($_SESSION['logado'])) {
    $_SESSION['redirect'] = $_SERVER['REQUEST_URI'];
    header("Location: login.php");
    exit();
}