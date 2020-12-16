<?php 
require_once "../config1.php"; 
require_once "../config.php"; 
function afficherposts($search, $tri)
{
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  
  $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY date_p DESC";
    if ($tri=="AZ")
    $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY Titre  ASC";
    if ($tri=="ZA")
    $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY Titre  DESC";
    if ($tri=="DC")
    $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY date_p ASC"; 
    if ($tri=="DD")
    $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY date_p DESC"; 
  
  echo $sql;
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {if (isset($search) && $search!=="")
    {echo "search results for: ".$search."<br>";
      while($row = $result->fetch_assoc()) 
      {
        if (strpos($row["Titre"], $search)!==false)
        {
        ?>
          <div class="card mb-4">
          <img class="card-img-top" src= <?php echo "../assets/img/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="read_post.php?id=<?= $row['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted in <?php echo $row["date_p"];?>
          </div>
        </div>
        <?php
      }
      }
    }
}
    if (!isset($search) || $search===""){
      while($row = $result->fetch_assoc()) 
      {
        
        ?>
          <div class="card mb-4">
          <img class="card-img-top" src= <?php echo "../assets/img/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="read_post.php?id=<?= $row['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted in <?php echo $row["date_p"];?>
          </div>
        </div>
        <?php
      }
      }
    if ($result->num_rows ==0)
      echo "no result";
    
  $conn->close();
}
function afficherpostsMod($search)
{
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY date_p DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) 
  {if (isset($search) && $search!=="")
    {echo "search results for: ".$search."<br>";
      while($row = $result->fetch_assoc()) 
      {
        if (strpos($row["Titre"], $search)!==false)
        {
        ?>
          <div class="card mb-4">
          <img class="card-img-top" src= <?php echo "../assets/img/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
            <form NAME="f" action="ModBlogPost.php" method="POST">
              <input id="id" name="id" value="<?= $row['id'] ?>" hidden>
            <a href="Update.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="margin:5px;">Modifier</a>    
            <button type="submit" class="btn btn-primary">Delete</button> 
          </form>
          </div>
          <div class="card-footer text-muted">
            Posted in <?php echo $row["date_p"];?>
          </div>
        </div>
        <?php
      }
      }
    }

    if (!isset($search) || $search===""){
      while($row = $result->fetch_assoc()) 
      {
        
        ?>
          <div class="card mb-4">
          <img class="card-img-top" src= <?php echo "../assets/img/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="#" class="btn btn-primary">Read More &rarr;</a>
            <form NAME="f" action="ModBlogPost.php" method="POST">
              <input id="id" name="id" value="<?= $row['id'] ?>" hidden>
            <a href="Update.php?id=<?= $row['id'] ?>" class="btn btn-primary" style="margin:5px;">Modifier</a>    
            <button type="submit" class="btn btn-primary">Delete</button> 
          </form>
          </div>
          <div class="card-footer text-muted">
            Posted in <?php echo $row["date_p"];?>
          </div>
        </div>
        <?php
      }
      }
    }
    if ($result->num_rows ==0)
      echo "no result";
    
  $conn->close();
}

function addReveiw($post) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO review_post (Titre, Message, Picture) 
                VALUES (:nom, :post, :image)'
                );
                $query->execute([
                    'nom' => $post->nom,
                    'post' => $post->text,
                    'image' => $post->picture
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

function deletePost($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM review_post WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }

function update($post, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE review_post SET titre = :titre, message = :post, Picture = :image WHERE id = :id'
                );
                $query->execute([
                    'titre' => $post->nom,
                    'image' => $post->picture,
                    'post' => $post->text,
                    'id' => $id
                ]);
                echo "changes saved";
                echo $query->rowCount() . " records UPDATED successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } 




function sendmail () {
  
  $headers = "From: istupid691@gamil.com\r\n";

  $to = "jaouani.walid@esprit.tn";
  $subject = "Sending Emails From Localhost";
  $message = "Sending emails from a localhost home server?\n\nEven send custom multi line emails? Tell me more!";

  if ( mail($to, $subject, $message, $headers) )
    echo 'Success!';
  else
    echo 'UNSUCCESSFUL...';
}             

function get_post_by_id($id)
{
  $post=new post();
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT Titre, Message, date_p, picture FROM review_post WHERE id=47";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc()) 
      {$post->nom=$row["Titre"];
  $post->date=$row["date_p"];
  $post->text=$row["Message"];
  $post->picture=$row["picture"];}}
  else
  echo "no result";
  $conn->close();
  return $post;
}

function afficher_comments($id)
{
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT id_user,id_post,message,date_p FROM comment WHERE id_post=$id ORDER BY date_p DESC ";
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) 
  {
      while($row = $result->fetch_assoc()) 
      {
        
        ?>
          <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
          <div class="media-body">
            <h5 class="mt-0"><?php echo $row["id_user"]; ?></h5>
           <?php echo $row["message"]; ?>
            <h6 class="mt-0">Posted on <?php echo $row["date_p"]; ?></h6>
          </div>
        </div>
        <?php
    }
}
}

function add_comment($id,$id_user,$message)
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO comment (id_user,id_post,message) 
                VALUES (:id_user,:id_post,:message)'
                );
                $query->execute([
                    'id_user' => $id_user,
                    'id_post' => $id,
                    'message' =>$message
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
}






?>
