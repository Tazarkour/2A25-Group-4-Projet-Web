<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../assets/css/blog-home.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Radisson Blu</a>
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

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Blog
          <small>Radisson Blu</small>
        </h1>

        <!-- Blog Post -->
        <?php 
        include "../config.php";
        include "../Controller/BlogC.php";
        
        $search="";
        if (isset($_GET["search"]))
        {
          $search=$_GET["search"];
        }
        if (isset($_GET["tri"]))
          $tri=$_GET["tri"];
        else $tri="";
        echo $tri;
        afficherposts($search, $tri);

        ?>
      </div>

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <form method="GET" action="" >
              <input type="text" class="form-control" id="search" name="search" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-secondary" type="submit">Go!</button>
              </form>
              </span>
            </div>
             <div class="card my-4">
          <h5 class="card-header">Trier Par</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="WatchBlogPost.php?tri=AZ">Alphabetique A-Z</a>
                  </li>
                  <li>
                    <a href="WatchBlogPost.php?tri=ZA">Alphabetique Z-A</a>
                  </li>
                  <li>
                    <a href="WatchBlogPost.php?tri=DC">Date Croissant</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="WatchBlogPost.php?tri=DD">Date Decroissant</a>
                  </li>
                  <li>
                    <a href="#">Most Active</a>
                  </li>
                  <li>
                    <a href="#">Least Active</a>
                  </li>
                </ul>
              </div>
            </div>
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
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
