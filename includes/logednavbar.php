<nav>
    <ul style="text-align: right">
        <li><a href="#i"><?php $_SESSION["user"] ?></a></li>
        <li><a href="#perfil"> Perfil </li>
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
        ?>