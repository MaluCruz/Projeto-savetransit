<?php
$mysql = new mysqli("localhost", 'root', '', "securybd");

# CONEXÃO COM BANCO DE DADOS
$con = mysqli_connect('localhost', 'root', '', 'securybd');

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $email = $_POST["email"];
    $nova_senha = $_POST["nova_senha"];
    $confirma_senha = $_POST["confirma_senha"];

    // Faça a validação de email e senhas (como no exemplo anterior)

    // Se as senhas coincidem, continue
    if ($nova_senha == $confirma_senha) {
        // Conecte ao banco de dados

        // Verifique a conexão
        if ($con->connect_error) {
            die("Conexão falhou: " . $con->connect_error);
        }

        // Atualize a senha no banco de dados
        $sql = "UPDATE cad_usuario SET senha='$nova_senha' WHERE email='$email'";

        if ($con->query($sql) === TRUE) {
            echo "Senha atualizada com sucesso!";
        } else {
            echo "Erro ao atualizar a senha: " . $con->error;
        }

        // Feche a conexão com o banco de dados
        $con->close();
    } else {
        echo "As senhas não coincidem!";
    }
} else {
    echo "Acesso inválido!";
}
?>