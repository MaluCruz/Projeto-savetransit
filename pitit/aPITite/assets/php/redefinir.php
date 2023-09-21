<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["email"])) {
            $email = $_POST["email"];
               
            echo "Um e-mail com instruções para redefinir sua senha foi enviado para: " . $email;
        } else {
           
            echo "Por favor, preencha todos os campos obrigatórios.";
        }
    }
