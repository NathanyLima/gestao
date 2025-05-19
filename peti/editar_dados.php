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

<?php
// Exibir mensagens de sucesso ou erro
if (isset($_GET['sucesso'])) {
    $mensagem = match($_GET['sucesso']) {
        'dados_salvos' => 'Dados salvos com sucesso!',
        default => 'Operação realizada com sucesso!'
    };
    echo '<div class="alert success">'.$mensagem.'</div>';
}

if (isset($_GET['erro'])) {
    $mensagem = match($_GET['erro']) {
        'campos_vazios' => 'Todos os campos são obrigatórios!',
        'banco_dados' => 'Erro ao salvar no banco de dados',
        default => 'Ocorreu um erro!'
    };
    echo '<div class="alert error">'.$mensagem.'</div>';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Dados da Empresa</title>
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
        <a href="dados_empresa.php">Dados da Empresa</a>
    </nav>

    <h1>Editar Dados da Empresa</h1>

    <div class="container">
        <form action="salvar_missao_visao.php" method="POST">
            <label for="nome">Nome:</label>
            <br>
            <input type="text" id="nome" name="nome" value="<?php echo isset($dados['nome']) ? htmlspecialchars($dados['nome']) : ''; ?>" required>
            <br>
            <label for="missao">Missão:</label>
            <br>
            <textarea name="missao" id="missao" rows="4" cols="50" required><?php echo isset($dados['missao']) ? htmlspecialchars($dados['missao']) : ''; ?></textarea>
            <br>
            <label for="visao">Visão:</label>
            <br>
            <textarea name="visao" id="visao" rows="4" cols="50" required><?php echo isset($dados['visao']) ? htmlspecialchars($dados['visao']) : ''; ?></textarea>
            <br>
            <button type="submit">Salvar</button>
        </form>
    </div>
</body>
</html>
