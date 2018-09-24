<nav>
    <ul style="text-align: right">
        <li><p style="color: #fff;">Olá <?php echo $_SESSION["nome"] ?>!</p></li>
        <?php
            switch($_SESSION["nivel"]){
                case "Adm Geral":
                    include "menus/admG.php";
                    break;
                case "Adm":
                    include "menus/adm.php";
                    break;
                case "Redator":
                    include "menus/redator.php";
                    break;
                case "Usuario": include "menus/user.php";
                    break;
            }
            echo "<li><a href=../Controller/logout.php?token=".md5(session_id()).">Sair</a></li>";
        ?>

    </ul>
</nav>