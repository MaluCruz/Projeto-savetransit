<?php
session_start();
require("assets/php/conexao_pdo.php");
if(isset($_SESSION['user_id'])) {
    header("Location: tabela.php");
    exit;
}
function read($pdo){
    $sql = "SELECT * FROM autoridades";
    $stmt = $pdo->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM autoridades WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(':username', $username);
    $stmt->bindValue(':password', $password);
    $stmt->execute();

    // Verifique se encontrou uma correspondência
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Login bem-sucedido
        $_SESSION['user_id'] = $user['id']; // Supondo que 'id' seja o campo que identifica o usuário
        header("Location: tabela.php");
        exit;
    } else {
        // Credenciais inválidas, exiba uma mensagem de erro ou faça outra ação apropriada
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="assets/css/style-e.css">
    <title>Login Dark/Light Mode</title>
</head>
<body>   
    <main id="container">
        <form id="login_form" method="post">
            <!-- FORM HEADER -->
            <div id="form_header">
                <h1>Autoridade</h1>
                <i id="mode_icon" class="fa-solid fa-moon"></i>
                
            </div>

            <!-- INPUTS -->
            <div id="inputs">
 
                <!-- EMAIL -->
                <div class="input-box">
                    <label for="email">
                        Código
                        <div class="input-field">
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" id="username" name="username">
                        </div>
                    </label>
                </div>
                
                <!-- PASSWORD -->
                <div class="input-box">
                    <label for="password">
                        Password
                        <div class="input-field">
                            <i class="fa-solid fa-key"></i>
                            <input type="password" id="password" name="password">
                        </div>
                    </label>
                    
                    <!-- FORGOT PASSWORD -->
                    <div id="forgot_password">
                        <a href="redefinirSenha.html">
                            Esqueceu a senha?
                        </a>
                    </div>
                </div>
            </div>

            <!-- LOGIN BUTTON -->
            <button type="submit" id="login_button">
                Entrar <a href="tabela.php"></a>
            </button>
              <!-- CADASTRAR BUTTON -->
              <button type="button" id="cadastrar_button">
                Voltar <a href="entrar.html"></a>
            </button>
        </form>
    </main>

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="assets/js/script.js"></script>
    <script>
        document.getElementById('cadastrar_button').addEventListener('click', function() {
            window.location.href = 'entrar.html';
        });
    </script>
</body>

</html>