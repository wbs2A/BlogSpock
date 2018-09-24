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


DELIMITER $$
USE `blogspock`$$
CREATE DEFINER = CURRENT_USER TRIGGER `id3097493_blogspock`.`creation_time` AFTER INSERT ON `post` FOR EACH ROW
BEGIN
update post set post.horaCriacao=now() where post.idpost=last_insert_id();
END$$

USE `blogspock`$$
CREATE DEFINER = CURRENT_USER TRIGGER `blogspock`.`comentario_AFTER_INSERT` AFTER INSERT ON `comentario` FOR EACH ROW
BEGIN
update comentario set comentario.horaCriacao=now() where comentario.idcomentario=last_insert_id();

END$$

use blogspock $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `del_post`(`id` INT)
BEGIN
SET SESSION AUTOCOMMIT=0;
SET AUTOCOMMIT =0;
START TRANSACTION;
DELETE FROM comentario  WHERE comentario.post_idpost = id;
DELETE FROM post WHERE post.idpost = id;
SELECT "suscesso" as suscesso;
COMMIT;
SET SESSION AUTOCOMMIT=1;
SET AUTOCOMMIT =1;
END $$


CREATE DEFINER=`root`@`localhost` PROCEDURE `del_user`(`id` INT)
BEGIN
SET SESSION AUTOCOMMIT = 0;
SET AUTOCOMMIT = 0;
START TRANSACTION;
DELETE FROM comentario WHERE comentario.usuario_idusuario = id;
DELETE FROM post WHERE post.usuario_idusuario = id;
DELETE FROM solicitacoes
DELETE FROM usuario WHERE usuario.idusuario = id;
SELECT "suscesso" as suscesso;
COMMIT;
SET SESSION AUTOCOMMIT=1;
SET AUTOCOMMIT =1;
END $$
DELIMITER ;