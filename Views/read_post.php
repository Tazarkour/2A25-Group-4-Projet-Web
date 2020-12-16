<?php
include "../Controller/BlogC.php";
include "../Model/bloc.php";
$post=new post();
$id=$_GET["id"];
echo $id;
$post=get_post_by_id($id);
if (isset($_POST["message"]))
{
  $message=$_POST["message"];
  $id_user=60;
  add_comment($id,$id_user,$message);
}
?>

<!DOCTYPE html>
<html lang="en">

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
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

        <!-- Title -->
        <h1 class="mt-4"><?php echo $post->nom; ?></h1>

        <hr>

        <!-- Date/Time -->
        <p><?php echo $post->date; ?></p>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src=<?php echo "../assets/img/".$post->picture." width="."900"." height="."300"; ?>" alt=">

        <hr>

        <!-- Post Content -->
        <p class="lead"><?php echo $post->text; ?></p>
        <hr>

        <!-- Comments Form -->
       
        <div class="card my-4">
          <h5 class="card-header">Leave a Comment:</h5>
          <div class="card-body">
            <form NAME="f" action="read_post.php?id=<?= $id ?>" method="POST">
              <div class="form-group">
                <textarea class="form-control" name="message" id="message" rows="3"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
         <?php afficher_comments($id); ?>


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
