<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>🐵Micomida</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .login-form {
            max-width: 400px;
            border-radius: 10px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .login-form .form-group {
            text-align: center;
        }

        .login-form label {
            font-weight: bold;
        }

        .login-form input[type="text"],
        .login-form input[type="date"],
        .login-form input[type="email"],
        .login-form input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            font-size: 14px;
        }

        .login-form input[type="submit"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
        }

        .login-form input[type="submit"]:hover {
            background-color: #0069d9;
        }
    </style>
</head>
<body>
<div class="login-form" >
        <div class="text-center">
            <img src="img/logo.png" alt="Logo" width="150">
                <form action="cadastrocliente.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" required>
                </div>
                <div class="form-group">
                    <label for="nascimento">Data de Nascimento:</label>
                    <input type="date" name="nascimento" required>
                </div>  
                <div class="form-group">
                    <label>Gênero:</label>
                    <input type="radio" name="genero" value="masculino" required>
                    <label for="masculino">Masculino</label>
                    <input type="radio" name="genero" value="feminino" required>
                    <label for="feminino">Feminino</label>
                    <input type="radio" name="genero" value="nao-binario" required>
                    <label for="nao-binario">Não-Binário</label>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" name="senha" placeholder="Senha" maxlength="40" required/><br/>
                    <input type="submit" name="grava" value="Enviar">
                </div>
                </form>
<footer>
</footer>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<?php
include "conn.php";
function emailJaCadastrado($email) {
    global $conn;
    $consulta = $conn->prepare('SELECT COUNT(*) FROM cliente WHERE email_cliente = :email');
    $consulta->bindValue(':email', $email);
    $consulta->execute();
    $count = $consulta->fetchColumn();
    return ($count > 0);
}
        if(isset($_POST['grava'])){
        $nome=$_POST['nome'];
        $nascimento=$_POST['nascimento'];
        $genero=$_POST['genero'];
        $email=$_POST['email'];
        $senha=md5($_POST['senha']);
        if (emailJaCadastrado($email)) {
            echo "E-mail já cadastrado. Por favor, escolha outro e-mail.";
        } else {
            $grava=$conn->prepare('INSERT INTO `cliente` (`id_cliente`, `nm_cliente`, `dt_nasc_cliente`, `sexo`, `email_cliente`, `senha_cliente`) VALUES (NULL, :pnome, :pnascimento, :pgenero, :pemail, :psenha);');
            $grava->bindValue(':pnome',$nome);
            $grava->bindValue(':pnascimento',$nascimento);
            $grava->bindValue(':pgenero',$genero);
            $grava->bindValue(':pemail',$email);
            $grava->bindValue(':psenha',$senha);
            $grava->execute();
            echo "ENVIADO!";
        }
    }
?>
