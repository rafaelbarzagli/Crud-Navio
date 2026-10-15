<?php
require_once "conexao.php";

if (!isset($_GET['id'])) {
    header("Location: listar.php");
    exit;
}

$id = $_GET['id'];

$sql = "SELECT * FROM cadastro WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();

$result = $stmt->get_result();
$dados = $result->fetch_assoc();

if (!$dados) {
    echo "Registro não encontrado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cadastro</title>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body{
            background: linear-gradient(135deg, #0f172a, #1e293b);
            min-height:100vh;
            padding:40px 20px;
            color:#fff;
        }

        .container{
            max-width:1200px;
            margin:auto;
            background:#ffffff;
            border-radius:20px;
            padding:40px;
            box-shadow:
                0 15px 40px rgba(0,0,0,0.25),
                0 5px 15px rgba(0,0,0,0.15);
        }

        .topo{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:35px;
            flex-wrap:wrap;
            gap:15px;
        }

        h2{
            color:#0f172a;
            font-size:34px;
            font-weight:700;
        }

        .subtitulo{
            color:#64748b;
            margin-top:5px;
            font-size:15px;
        }

        .status{
            background:#dbeafe;
            color:#1d4ed8;
            padding:10px 18px;
            border-radius:30px;
            font-size:14px;
            font-weight:600;
        }

        form{
            display:grid;
            grid-template-columns: repeat(2, 1fr);
            gap:25px;
        }

        .card{
            background:#f8fafc;
            border:1px solid #e2e8f0;
            border-radius:16px;
            padding:25px;
        }

        .card.full{
            grid-column:1 / -1;
        }

        .card h3{
            color:#0f172a;
            margin-bottom:20px;
            font-size:20px;
            border-bottom:2px solid #e2e8f0;
            padding-bottom:10px;
        }

        .form-group{
            display:flex;
            flex-direction:column;
            margin-bottom:18px;
        }

        .form-group:last-child{
            margin-bottom:0;
        }

        label{
            margin-bottom:8px;
            color:#334155;
            font-size:14px;
            font-weight:600;
        }

        input,
        textarea,
        select{
            width:100%;
            padding:14px;
            border-radius:12px;
            border:1px solid #cbd5e1;
            background:#fff;
            font-size:15px;
            transition:0.3s;
            color:#0f172a;
        }

        input:focus,
        textarea:focus,
        select:focus{
            outline:none;
            border-color:#2563eb;
            box-shadow:0 0 0 4px rgba(37,99,235,0.15);
        }

        textarea{
            min-height:140px;
            resize:vertical;
        }

        .btn-area{
            grid-column:1 / -1;
            display:flex;
            justify-content:center;
            margin-top:10px;
        }

        button{
            background:linear-gradient(135deg, #2563eb, #1d4ed8);
            color:#fff;
            border:none;
            padding:16px 40px;
            border-radius:14px;
            font-size:16px;
            font-weight:700;
            cursor:pointer;
            transition:0.3s;
            box-shadow:0 10px 20px rgba(37,99,235,0.25);
        }

        button:hover{
            transform:translateY(-3px);
            box-shadow:0 15px 25px rgba(37,99,235,0.35);
        }

        .linha-dupla{
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:15px;
        }

        @media(max-width:900px){

            form{
                grid-template-columns:1fr;
            }

            .linha-dupla{
                grid-template-columns:1fr;
            }

        }

        @media(max-width:600px){

            .container{
                padding:25px;
            }

            h2{
                font-size:28px;
            }

        }

    </style>
</head>

<body>
    <div class="container">

        <div class="topo">
            <div>
                <h2>Editar Registro</h2>
                <div class="subtitulo">
                    Atualize as informações da operação marítima
                </div>
            </div>

            <div class="status">
                ID #<?php echo $dados['id']; ?>
            </div>
        </div>

        <form action="atualizar.php" method="POST">

            <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">

            <!-- DADOS DO NAVIO -->
            <div class="card">

                <h3>Dados do Navio</h3>

                <div class="form-group">
                    <label>Navio</label>
                    <input type="text" name="navio" value="<?php echo $dados['navio']; ?>">
                </div>

                <div class="form-group">
                    <label>IMO</label>
                    <input type="text" name="imo" value="<?php echo $dados['imo']; ?>">
                </div>

                <div class="form-group">
                    <label>Tripulação</label>
                    <input type="text" name="tripulacao" value="<?php echo $dados['tripulacao']; ?>">
                </div>

                <div class="form-group">
                    <label>Agência</label>
                    <input type="text" name="agencia" value="<?php echo $dados['agencia']; ?>">
                </div>

            </div>

            <!-- OPERAÇÃO -->
            <div class="card">

                <h3>Operação</h3>

                <div class="form-group">
                    <label>Tipo de Operação</label>
                    <input type="text" name="tipooperacao" value="<?php echo $dados['tipooperacao']; ?>">
                </div>

                <div class="form-group">
                    <label>Local</label>
                    <input type="text" name="local" value="<?php echo $dados['local']; ?>">
                </div>

                <div class="form-group">
                    <label>Data da Operação</label>
                    <input type="date" name="dataoperacao" value="<?php echo $dados['dataoperacao']; ?>">
                </div>

                <div class="form-group">
                    <label>Resíduo</label>
                    <input type="text" name="residuo" value="<?php echo $dados['residuo']; ?>">
                </div>

            </div>

            <!-- HORÁRIOS -->
            <div class="card full">

                <h3>Horários Operacionais</h3>

                <div class="linha-dupla">

                    <div class="form-group">
                        <label>Atracação</label>
                        <input type="time" name="atracacao" value="<?php echo $dados['atracacao']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Início Bombeio</label>
                        <input type="time" name="iniciobombeio" value="<?php echo $dados['iniciobombeio']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Fim Bombeio</label>
                        <input type="time" name="fimbombeio" value="<?php echo $dados['fimbombeio']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Desatracação</label>
                        <input type="time" name="desatracacao" value="<?php echo $dados['desatracacao']; ?>">
                    </div>

                </div>

            </div>

            <!-- FINANCEIRO -->
            <div class="card">

                <h3>Financeiro</h3>

                <div class="form-group">
                    <label>Volume</label>
                    <input type="number" step="0.01" name="volume" value="<?php echo $dados['volume']; ?>">
                </div>

                <div class="form-group">
                    <label>Porcentagem</label>
                    <input type="number" step="0.01" name="porcentagem" value="<?php echo $dados['porcentagem']; ?>">
                </div>

                <div class="form-group">
                    <label>Dado Bancário</label>
                    <input type="text" name="dadobancario" value="<?php echo $dados['dadobancario']; ?>">
                </div>

            </div>

            <!-- PORTO -->
            <div class="card">

                <h3>Controle de Porto</h3>

                <div class="form-group">
                    <label>Saída do Porto</label>
                    <input type="date" name="saidaporto" value="<?php echo $dados['saidaporto']; ?>">
                </div>

                <div class="form-group">
                    <label>Horário Saída</label>
                    <input type="time" name="horariosaida" value="<?php echo $dados['horariosaida']; ?>">
                </div>

                <div class="form-group">
                    <label>Retorno ao Porto</label>
                    <input type="date" name="retornoporto" value="<?php echo $dados['retornoporto']; ?>">
                </div>

                <div class="form-group">
                    <label>Horário Retorno</label>
                    <input type="time" name="horarioretorno" value="<?php echo $dados['horarioretorno']; ?>">
                </div>

            </div>

            <!-- OBS -->
            <div class="card full">

                <h3>Observações</h3>

                <div class="form-group">
                    <textarea name="obs"><?php echo $dados['obs']; ?></textarea>
                </div>

            </div>

            <div class="btn-area">
                <button type="submit">
                    Atualizar Registro
                </button>
            </div>

        </form>

    </div>

</body>
</html>