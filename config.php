<?php
// Configurações do banco de dados
$servername = "localhost"; // Nome do servidor do banco de dados
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "formulario-aniversario"; // Nome do banco de dados

// Conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

// Processamento do formulário
if (isset($_POST['confirmar'])) {
    $name = $_POST['name'];
    $family = $_POST['family'];

    // Insere os dados no banco de dados
    $sql = "INSERT INTO usuarios (nome, quantidade) VALUES ('$name', '$family')";
    if ($conn->query($sql) === true) {
        echo "<!DOCTYPE html>
                <html>
                <head>
                    <title>Confirmação de Festa de Aniversário</title>
                    <style>
                        body {
                            display: flex;
                            align-items: center;
                            justify-content: center;
                            font-family: Arial, sans-serif;
                            background-color: #ff5de4;
                            margin: 0;
                            padding: 20px;
                            height: 100vh;
                        }

                        .confirmation-message {
                            text-align: center;
                            font-size: 30px;
                            color: #fff;
                            background-color: #4caf50;
                            padding: 40px;
                            border-radius: 4px;
                        }
                    </style>
                </head>
                <body>
                    <div class='confirmation-message'>Confirmação sua e de sua família registrada com sucesso!</div>
                </body>
                </html>";
    } else {
        echo "Erro ao registrar a confirmação de participação: " . $conn->error;
    }
}

// Fecha a conexão com o banco de dados
$conn->close();
?>
