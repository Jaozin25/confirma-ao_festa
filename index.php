<!DOCTYPE html>
<html>
<head>
    <title>Confirmação de Festa de Aniversário</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ff5de4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 380px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .confirmation-message {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: #4caf50;
            color: #ffffff;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Confirmação de Festa de Aniversário</h1>
    
    <img src="https://i.ibb.co/XCB5MYz/Screenshot-3.png" alt="Convite" style="display: block; margin: 0 auto; max-width: 300px;">
    
    <form method="POST" action="config.php">
        <label for="name">Seu nome:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="family">Quantidade de pessoas na família (excluindo você):</label>
        <input type="number" id="family" name="family" min="0" required><br><br>
        
        <input type="submit" name="confirmar" value="Confirmar participação">
    </form>

    <?php
    if (isset($_POST['confirmar'])) {
        $name = $_POST['name'];
        $family = $_POST['family'];

        $sql = "INSERT INTO usuarios (nome, quantidade) VALUES ('$name', '$family')";
        if ($conn->query($sql) === true) {
            echo "<div class='confirmation-message'>Confirmação de participação registrada com sucesso!</div>";
        } else {
            echo "<div class='error-message'>Erro ao registrar a confirmação de participação: " . $conn->error . "</div>";
        }
    }
    ?>
</body>
</html>
