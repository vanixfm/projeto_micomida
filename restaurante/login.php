<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://accounts.google.com/gsi/client" async defer></script>

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
            background-color: #ffffff;
        }
        
        .login-form .form-group {
            text-align: center;
        }

        .login-form h1 {
            color: #000000;
            font-weight: bold;
        }

        .login-form .form-control {
            color: #000000;
        }

        .login-form .btn {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }

        .login-form .btn:hover {
            background-color: #0069d9;
        }

        .login-form a {
            color: #dc3545;
            font-weight: bold;
        }
        
        .login-form a:hover {
            color: #c82333;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <div class="text-center">
            <img src="img/logo.png" alt="Logo" width="150">
            <h1>Login cliente</h1>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                </div>
                <button type="submit" name="login" class="btn btn-warning btn-block">Entrar</button>
            </form>
            <div class="form-group">
                <p>Ou faça login com:</p>
                <a id="google-login-button" class="btn btn-warning btn-block">Login com Google</a>
            </div>
            <a class="nav-link" href="cadastrocliente.php">Não possuo conta</a>
        </div>
    </div>
    
</body>
<script>
    function handleCredentialResponse(response) {
        // Obter as credenciais de acesso do usuário
        const credential = response.credential;

        // Enviar as credenciais para o seu servidor para autenticação

        // Exemplo de código para enviar as credenciais usando Ajax:
        // const xhr = new XMLHttpRequest();
        // xhr.open('POST', 'seu-servidor.com/autenticar');
        // xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        // xhr.onload = function() {
        //     // Verificar a resposta do servidor
        //     if (xhr.status === 200) {
        //         // Sucesso no login, redirecionar ou realizar outras ações necessárias
        //     } else {
        //         // Falha no login, lidar com o erro
        //     }
        // };
        // xhr.send('id_token=' + credential);

        // Você pode adicionar o código para redirecionar o usuário ou realizar outras ações necessárias aqui
    }

    function startGoogleLogin() {
        // Configurar o botão de login com o Google
        const googleLoginButton = document.getElementById('google-login-button');

        // Configurar as opções
        const options = {
            clientId: 'http://512367628257-4p0asait1h9qsnslnprhg6cm884mvlpu.apps.googleusercontent.com/',
            callback: handleCredentialResponse,
            theme: 'dark', // Escolha 'light' ou 'dark' para o tema do botão
            nonce: function () {
                return 'nonce';
            },
        };

        // Renderizar o botão de login com o Google
        google.accounts.id.initialize(options);
        google.accounts.id.renderButton(googleLoginButton, options);
    }

    // Iniciar o login com o Google quando a página carregar
    window.onload = function() {
        startGoogleLogin();
    };
</script>

</html>
