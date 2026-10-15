<?php 
require_once("conexao.php");

$mensagem = "";
$tipo_mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $navio = $_POST['navio'];
    $imo = $_POST['imo'];
    $dataoperacao = $_POST['dataoperacao'];
    $tipooperacao = $_POST['tipooperacao'];
    $local = $_POST['local'];
    $atracacao = $_POST['atracacao'];
    $inicio_bombeio = $_POST['inicio_bombeio'];
    $fim_bombeio = $_POST['fim_bombeio'];
    $desatracacao = $_POST['desatracacao'];
    $volume = $_POST['volume'];
    $porcentagem = $_POST['porcentagem'];
    $tripulacao = $_POST['tripulacao'];
    $agencia = $_POST['agencia'];
    $dadobancario = $_POST['dadobancario'];
    $residuo = $_POST['residuo'];
    $obs = $_POST['obs'];
    $saidaporto = $_POST['saidaporto'];
    $horariosaida = $_POST['horariosaida'];
    $retornoporto = $_POST['retornoporto'];
    $horarioretorno = $_POST['horarioretorno'];

    $sql = "INSERT INTO cadastro (
        navio, imo, dataoperacao, tipooperacao, local,
        atracacao, iniciobombeio, fimbombeio, desatracacao,
        volume, porcentagem,
        tripulacao, agencia, dadobancario, residuo, obs,
        saidaporto, horariosaida, retornoporto, horarioretorno
    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param(
        "ssssssssddssssssssss",
        $navio,
        $imo,
        $dataoperacao,
        $tipooperacao,
        $local,
        $atracacao,
        $inicio_bombeio,
        $fim_bombeio,
        $desatracacao,
        $volume,
        $porcentagem,
        $tripulacao,
        $agencia,
        $dadobancario,
        $residuo,
        $obs,
        $saidaporto,
        $horariosaida,
        $retornoporto,
        $horarioretorno
    );

    if ($stmt->execute()) {
        header("Location: index.php?status=sucesso");
        exit;
    } else {
        header("Location: index.php?status=erro");
        exit;
    }

    $stmt->close();
}
?>