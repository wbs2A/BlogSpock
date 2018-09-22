<?php
    $erro = isset($_GET['erro']) ? $_GET['erro'] : 0; /* Erro caso login não for validado */
    session_start();
      include "../includes/header.php";
      include "../includes/sidebar.php";
      include "../Controller/BDClass.class.php";
    try{
        $db = bd::getInstance();
        $posts = $db->selectAllPosts();
    }catch(\Exception $e){
        $posts = null;
    }
?>
<?php if($posts){
  while($post = $posts->fetch_assoc()){
   ?>
    <div class="post">
        <h1 class="title"><?php $post["titulo"] ?></h1>
        <div class="createdby">
            <?php echo ($db->getUser($post["usuario_idusuario"]))["nome"];
                  if($post["ult_Alt"] != null)
                      echo $post["ult_Alt"];
                  else
                      echo $post["horaCriacao"];
            ?>
        </div>
        <h2 class="description"><?php echo $post["descricao"] ?></h2>
        <p class="posttext">
            <?php echo $post["textoPost"] ?>
        </p>
    </div>
  <?php  }
    }else{

    } ?>
<?php include "../includes/footer.php"; ?>