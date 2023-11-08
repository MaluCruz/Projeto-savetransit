<?php
$mysql = new mysqli("localhost", "root", "", "securybd");

# CONEXÃO COM BANCO DE DADOS
$con = mysqli_connect('localhost', 'root', '', 'securybd');

$name = $_POST['name'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

# Verifica se as senhas são iguais
if ($password != $confirmPassword) {
    echo "As senhas não coincidem.";
    mysqli_close($con);
    exit(); // Encerra o script caso as senhas não sejam iguais
}

# INSERÇÃO DE VALORES NO BANCO DE DADOS
$sql = "INSERT INTO `CAD_USUARIO` (`cpf`, `email`, `senha`, `telefone`, `nome`) VALUES ('$cpf', '$email', '$password', '$phone', '$name')";

if (empty($name) || empty($cpf) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
    echo json_encode(array("status" => "error", "message" => "Todos os campos devem ser preenchidos."));
    mysqli_close($con);
    exit();
}

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "Cadastro feito com sucesso!";
} else {
    echo "Erro ao cadastrar usuário: " . mysqli_error($con);
}

mysqli_close($con);
?>
