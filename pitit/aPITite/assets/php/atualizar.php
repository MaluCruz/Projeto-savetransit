<?php

$con = mysqli_connect('localhost', 'root', '', 'securybd');

$new_name = $_POST['new_name'];
$cpf = $_POST['cpf'];
$new_email = $_POST['new_email'];
$new_phone = $_POST['new_phone'];
$new_password = $_POST['new_password'];
$confirmPassword = $_POST['confirmPassword'];

# Verifica se as senhas são iguais
if ($new_password != $confirmPassword) {
    echo "As senhas não coincidem.";
    mysqli_close($con);
    exit(); // Encerra o script caso as senhas não sejam iguais
}

$sql = "UPDATE cad_usuario SET nome ='$new_name', email='$new_email', telefone='$new_phone', senha='$new_password' WHERE cpf='$cpf'";

$rs = mysqli_query($con, $sql);

if ($rs) {
    echo "Atualização feita com sucesso!";
} else {
    echo "Erro ao atualizar dados do usuário: " . mysqli_error($con);
}

mysqli_close($con);
?>