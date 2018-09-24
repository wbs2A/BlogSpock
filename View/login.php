
<?php include "../includes/headerlog.php"; ?>
        <center><h1 id="titulo"> Bem Vindo Blogueirinhx </h1></center>
        <div id="content">
            
            <form action="../Controller/loginController.php" method="post">
                <p> Usuário: <input type="text" name="username" required></p>
                <p> Senha: <input type="password" name="passw" required></p>
                <p> <a href="recuperar.php"> Esqueceu a senha? </a></p>
                <input type="submit" value="Login">
            </form>
        </div>
<?php include "../includes/footer.php"; ?>