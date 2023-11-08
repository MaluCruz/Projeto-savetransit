<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de acidentes</title>
</head>
<body>
    <h1>Acidentes:</h1>
    <?php
    
    require ('assets/php/conexao_pdo.php');

    // Função para destruir a sessão
    function destruirSessao() {
        session_start();
        session_destroy();
        header("Location: entrar.html"); // Redireciona para a página de login
        exit;
    }

    // Verifica se o usuário está autenticado
    session_start();
    if(isset($_SESSION['user_id'])) {
        echo '<a href="logout.php">Logout</a>'; // Adiciona um link para fazer logout
    }

    function listarRegistros($pdo){
        $sql = "SELECT * FROM gravidade_acidente";
        $stmt = $pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    $registros = listarRegistros($pdo);

    // Exibindo os dados em uma tabela
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Serviço</th>
            <th>Quantidade de feridos</th>
            <th>Gravidade dos feridos</th>
            <th>Endereço</th>
        </tr>";
    foreach ($registros as $registro) {
        echo "<tr>";
        echo "<td>" . $registro['COD_ACIDENTE'] . "</td>";
        echo "<td>" . $registro['servico'] . "</td>";
        echo "<td>" . $registro['quantidade_feridos'] . "</td>";
        echo "<td>" . $registro['GRAVIDADE'] . "</td>";
        echo "<td>" . $registro['endereco'] . "</td>";
    }
    echo "</tr>";
    echo "</table>";

    ?>
</body>
</html>
