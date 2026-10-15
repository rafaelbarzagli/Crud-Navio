<?php
session_start();
include("conexao.php");

$usuario = $_POST['usuario'];
$senha   = $_POST['senha'];

$sql = "SELECT * FROM usuarios WHERE usuario = ?";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erro no prepare: " . $conn->error);
}
$stmt->bind_param("s", $usuario);
$stmt->execute();

$result = $stmt->get_result();

if ($dados = $result->fetch_assoc()) {

    if (password_verify($senha, $dados['senha'])) {

        $_SESSION['logado'] = true;
        $_SESSION['ultimo_acesso'] = time();

        if (!empty($_SESSION['redirect'])) {
            $pagina = $_SESSION['redirect'];
            unset($_SESSION['redirect']);
            header("Location: $pagina");
        } else {
            header("Location: vizualizar.php");
        }
        exit();

    } else {
        header("Location: login.php?erro=senha");
        exit();
    }

} else {
    header("Location: login.php?erro=usuario");
    exit();
}