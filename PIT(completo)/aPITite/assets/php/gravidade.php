<?php
header('Content-Type: text/html; charset=utf-8');

$mysql = new mysqli("localhost", "root", "", "securybd");

# CONEXÃO COM BANCO DE DADOS
$con = mysqli_connect('localhost', 'root', '', 'securybd');

// Verificar a conexão
if (mysqli_connect_errno()) {
  echo "Falha ao conectar ao MySQL: " . mysqli_connect_error();
  exit();
}

if (isset($_POST['gravidade'])) {
  $gravidade = $_POST['gravidade'];
  $qtd_feridos = $_POST['qtd_feridos'];
  $endereco = $_POST['endereco'];
  $servico = $_POST['servico'];


  // Executar uma consulta para inserir o valor no banco de dados
  $sql = "INSERT INTO GRAVIDADE_ACIDENTE (servico,quantidade_feridos, GRAVIDADE, endereco) VALUES ('$servico','$qtd_feridos','$gravidade','$endereco' )";

  if (mysqli_query($con, $sql)) {
    echo "Obrigado por nos ajudar, pode voltar para a página anterior agora.";
  } else {
    echo "Erro ao inserir dados: " . mysqli_error($con);
  }
}

// Fechar a conexão
mysqli_close($con);
?>
