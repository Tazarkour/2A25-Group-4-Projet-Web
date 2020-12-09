<?php 
require_once "../config1.php"; 
require_once "../config.php"; 
function afficherposts($search)
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
    {
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
    {
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















/*
function sendmail () {
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT Titre, Message, date_p, picture, id FROM review_post ORDER BY date_p DESC";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)

  sendmail_path = "C:\xampp\sendmail\sendmail.exe -t";
  $headers = "From: nick@heytuts.com\r\n";

  $to = "bob@yoursite.com, demo@yoursite.com";
  $subject = "Sending Emails From Localhost";
  $message = "Sending emails from a localhost home server?\n\nEven send custom multi line emails? Tell me more!";

  if ( mail($to, $subject, $message, $headers) )
    echo 'Success!';
  else
    echo 'UNSUCCESSFUL...';
}       */      

?>
