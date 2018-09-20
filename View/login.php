<?php include "../includes/header.php"; ?>
        <div id="content">
            <h1> Vida longa e Próspera </h1>
            <form action="login.php" method="post">
                <p> Usuário:<input type="text" name="username" required></p>
                <p> Senha: <input type="password" name="passw" required></p>
                <input type="submit" value="Login">
            </form>
            <p>Esqueceu a senha?</p>
            <input type="submit" value="Recuperar senha">
        </div>
        <div id="cadastro">
            <p>Ainda não tem cadastro?</p>
            <form action="cadastro.php">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
<?php include "../includes/footer.php"; ?>