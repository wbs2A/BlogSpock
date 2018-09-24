
<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0; /* Erro caso login não for validado */
    session_start();
      include "../includes/header.php";
      include "../includes/sidebar.php";
      include "../Controller/BDClass.class.php";
    $db = bd::getInstance();
    $posts = $db->selectAllPosts();
?>

<?php
if(isset($_SESSION["nome"])){
    include "../includes/logednavbar.php";
}else{
    include "../includes/navbar.php";
}

?>
<div id="postRegion">
    <?php if($posts){
        while($post = $posts->fetch_assoc()){
            ?>
            <div class="post">
                <h1 class="title"><?php echo $post["titulo"] ?></h1>
                <div class="createdby">
                    <p><?php echo "Postado por: ".($db->getUser($post["usuario_idusuario"]))["nome"]."<br>";
                    if($post["ult_Alt"] != null)
                        echo $post["ult_Alt"];
                    else
                        echo $post["horaCriacao"];
                    ?></p>
                </div>
                <h2 class="description"><?php echo $post["descricao"] ?></h2>
                <p class="posttext">
                    <?php echo $post["textoPost"] ?>
                </p>
            </div>
        <?php  }
    } ?>
</div>
<?php include "../includes/footer.php"; ?>