<?php session_start();
if (!isset($_SESSION['id'])) {
  header(("Location: ../login.php"));
}
include_once "../../DB/Config.php";
$sql="SElECT * From reclamation";
$db = config2::getConnexion();

$liste=$db->query($sql);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Note Taking App</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- fontawesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <body>

    <div class = "note">
      <h2>Reclamation </h2>
      <div class = "note-input">
        <h3>Add A New Post: </h3>
        <div class = "note-wrapper">
          <input type = "text" id = "note-title" placeholder="Title of the message">
          <textarea rows = "5" placeholder="Write your message ... " id = "note-content"></textarea>
          <input type = "hidden" value="<?php echo $_SESSION['id']; ?>" id = "id-session">
          <button type = "button" class = "btn" id = "add-note-btn">
            <span><i class = "fas fa-plus"></i></span>
            POST
          </button>
        </div>
      </div>

      <div class = "note-list">
        <?php foreach ($liste as $r) {
          ?>
          <div class="note-item" data-id="1">
        <h3><?php echo $r['titre']; ?></h3>
        <p><?php echo $r['content']; ?></p>

    </div>
      <?php  } ?>
        <!-- note item -->
        <!-- <div class = "note-item">
          <h3>The Title Goes Here</h3>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi fugit omnis expedita porro adipisci, asperiores facere ea. Voluptates quos quia consequatur explicabo. Perspiciatis, repellat. Ea facere dolorum a iste maiores!</p>
          <button type = "button" class = "btn delete-note-btn">
            <span><i class = "fas fa-trash"></i></span>
            Remove
          </button>
        </div> -->
      </div>


    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    $('#add-note-btn').click(function(){
      var input1 = $('#note-title').val();
      var input2 = $('#note-content').val();
      var input3 = $('#id-session').val();
      if ( input1 !== "" && input2 !=="" ) {
        $.ajax({
                url:'../../Core/recla.php',
                data:{"title":input1, "content":input2, "id_user":input3},
                type:'get',
                success:function(result){

                },
                error:function(){},
                complete: function (data) {}

            });
      }

});
    </script>

    <script src="app.js"></script>
  </body>
</html>
