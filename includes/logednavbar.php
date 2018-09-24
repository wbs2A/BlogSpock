<nav>
    <ul style="text-align: right">
        <li><p style="color: #fff; text-align: right;">Olá <?php echo $_SESSION["nome"] ?>!</p></li>
        <li class="menuitem"><a href="#perfil"> Perfil </a> </li>
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
