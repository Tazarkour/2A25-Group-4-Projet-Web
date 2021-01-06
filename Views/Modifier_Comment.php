<?php
include "../Controller/BlogC.php";
include "../Model/bloc.php";
$post=new post();
$id=$_GET["id"];
session_start();
$error="";
if (isset ($_SESSION["e"]) && isset ($_SESSION["role"]))
{
  $role=$_SESSION["role"];
  $e=$_SESSION["e"];
}
if (isset($_GET["id"]))
{
  $id=$_GET["id"];
  $comment=Get_Comment ($id);

}
if (isset($_POST["id"]))
{
  $id=$_POST["id"];
  $comment=Get_Comment ($id);

}
if (isset($_POST["id"]) && isset($_POST["message"]))
{
  if (!empty($_POST["message"]))
  {$id=$_POST["id"];
  $comment=Get_Comment ($id);
  updatecomment($_POST["message"], $id);
  foreach($comment as $commentaire)
echo("<script>location.href = 'read_post.php?id=".$commentaire["id_post"]."';</script>");}
else $error="Empty";

}
?>

<!DOCTYPE html>
<html lang="en">
<script src="../Assets/Controledesaisiejs/controle.js"></script>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?php echo $post->nom ?></title>

  <!-- Bootstrap core CSS -->
  <link href="../Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Assets/css/blog-post.css" rel="stylesheet">

</head>

<body>
  <br>
    <br>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Radisson Blu</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="Acceuil.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="WatchBlogPost.php.">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">Account</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


        <!-- Comments Form -->
       
        <div class="card my-4">
          <h5 class="card-header">Modifiy:</h5>
          <h6 class="card-header"><?php echo $error; ?></h6>
          <div class="card-body">
            <form NAME="f" action="Modifier_Comment.php" method="POST">
              <div class="form-group">
                <?php 

                if (isset($_SESSION["e"])&& !empty($_SESSION["e"]))
                {foreach($comment as $commentaire){?>

                <textarea class="form-control" name="message" id="message" rows="3" onkeyup="EnableDisable(this)" value="<?php echo  $commentaire["Message"]; ?>"><?php echo  $commentaire["Message"]; ?></textarea>
                <input name="id" value="<?php  echo $commentaire["id"];?>" hidden>
                <?php }?>

              </div>
              <button type="submit" class="btn btn-primary" id="submit">Submit</button>
              <?php } else {?>
              <a type="button" class="btn btn-primary" href="signin.php">Login</a>
              <a type="button" class="btn btn-primary" href="signup.php">Register</a>
            <?php } ?>
            </form>
          </div>
        </div>
         </div>
        </div>

      </div>

      
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../Assets/vendor/jquery/jquery.min.js"></script>
  <script src="../Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
