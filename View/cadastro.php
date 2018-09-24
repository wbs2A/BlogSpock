
<?php include "../includes/headerlog.php"; ?>
        <center><h1 id="titulo"> Bem Vindo Blogueirinhx </h1></center>
        <div id="content" style="height: 37%">
            
            <form action="insert_cadastro.php" method="post">
                <p> Nome: <input type="text" name="username" required></p>
                <p> Data Nascimento: <input type="date" name="data" required></p>
                <p> Email: <input type="email" name="email" required></p>
                <p> Data Nascimento: <input type="data" name="data" required></p>
                <label> Tipo de usuário</label>
                <select name="nivel_acesso">
				  	<option value="3">Redator</option>
				  	<option value="3">Usuário</option>
				</select>
				<br /> <br />
                <input type="submit" value="Cadastrar">
            </form>
        </div>
<?php include "../includes/footer.php"; ?>