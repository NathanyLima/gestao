<?php
include 'conexao.php';

// Buscar dados existentes no banco
$dados = [];
$sql = "SELECT nome, missao, visao FROM organizacao LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $dados = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dados da Empresa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        nav {
            background-color: #333;
            padding: 10px;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 0 10px;
            background-color: #444;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #555;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <nav>
        <a href="index.php">Início</a>
        <a href="editar_dados.php">Editar Dados</a>
    </nav>

    <h1>Dados da Empresa</h1>

    <div class="container">
        <p><strong>Nome:</strong> <?php echo htmlspecialchars($dados['nome']); ?></p>
        <p><strong>Missão:</strong> <?php echo nl2br(htmlspecialchars($dados['missao'])); ?></p>
        <p><strong>Visão:</strong> <?php echo nl2br(htmlspecialchars($dados['visao'])); ?></p>
    </div>
</body>
</html>
