
<?php include "../includes/headercad.php"; ?>
        <center><h1 id="titulo"> Bem Vindo Blogueirinhx </h1></center>
        <div id="content" style="height: 37%">
            
            <form action="../Controller/insert_user.php" method="post">
                <p> Nome: <input type="text" name="username" required></p>
                <p> Data Nascimento: <input type="date" name="data" required></p>
                <p> Email: <input type="email" name="email" required></p>
                <p> Senha: <input type="password" name="senha" required></p>
                <label> Tipo de usuário</label>
                <select name="nivel">
                	<option value="0" selected> Selecione o nível</option>
				  	<option value="3">Redator</option>
				  	<option value="3">Usuário</option>
				</select>
				<br /> <br />
                <input type="submit" value="Cadastrar">
            </form>
        </div>
<?php include "../includes/footer.php"; ?>