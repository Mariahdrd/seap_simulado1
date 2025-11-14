<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGF - Sistema de Gestão de Frotas</title>
</head>
<body>
    <h1>SGF - Sistema de Gestão de Frotas</h1>
    <h2>Login</h2>

    <?php
    if(isset($_GET['erro'])){
        $erro = $_GET['erro'];

        if($erro = 'credenciais'){
            echo '<p>Email ou Senha incorretos. Tente novamente.</p>';
        }

    }
    ?>

    <form action="actions/login.php" method="post">
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
            <br>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha" required>
        </div>
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>