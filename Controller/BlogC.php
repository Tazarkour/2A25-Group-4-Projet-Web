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
          <img class="card-img-top" src= <?php echo "../assets/img/blog/".$row["picture"]." width="."750"." height="."300";?> >
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
          <img class="card-img-top" src= <?php echo "../assets/img/blog/".$row["picture"]." width="."750"." height="."300";?> >
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
function afficherpostsMod($search, $tri)
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
          <img class="card-img-top" src= <?php echo "../assets/img/blog/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="read_post.php?id=<?= $row['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
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
          <img class="card-img-top" src= <?php echo "../assets/img/blog/".$row["picture"]." width="."750"." height="."300";?> >
          <div class="card-body">
            <h2 class="card-title"><?php echo $row["Titre"];?></h2>
            <p class="card-text" ><?php echo $row["Message"]; ?></p> 
            <a href="read_post.php?id=<?= $row['id'] ?>" class="btn btn-primary">Read More &rarr;</a>
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
               echo $e->getMessage();
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
function updatecomment($message, $id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'UPDATE comment SET message=:message WHERE id = :id'
                );
                $query->execute([
                    'message' => $message,
                    'id' => $id
                ]);
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
  $sql="SELECT Titre, Message, date_p, picture FROM review_post WHERE id=$id";
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

function afficher_comments($id, $id_user, $role)
{
  $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT C.id,C.Nom_User,C.id_user,C.id_post,C.message,C.date_p,U.Picture FROM comment C inner JOIN utilisateur U ON C.id_user=U.id WHERE id_post=$id ORDER BY date_p DESC ";
  $result = $conn->query($sql); 
  if ($result->num_rows > 0) 
  {
      while($row = $result->fetch_assoc()) 
      {
        
        ?>
          <div class="media mb-4">
          <img class="d-flex mr-3 rounded-circle" src="../Assets/img/<?php echo $row["Picture"];?>" width ="50" height="50" alt="">
          <div class="media-body">
            <h5 class="mt-0"><?php echo $row["Nom_User"]; ?></h5>
           <?php echo $row["message"]; ?>
            <h6 class="mt-0">Posted on <?php echo $row["date_p"]; ?></h6>
             <?php if ($id_user==$row["id_user"] || $role=="admin") { ?>
              <a href="read_post.php?id=<?php echo $row['id_post'];?>&idcomment=<?php echo $row["id"];?>"> Supprimer</a>
               <a href="Modifier_Comment.php?id=<?php echo $row["id"];?>"> Modifier</a>
            <?php } ?>
          </div>
        </div>
        <?php
    }
}
}

function add_comment($id,$id_user,$message,$Nom)
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO comment (id_user,id_post,message,Nom_User) 
                VALUES (:id_user,:id_post,:message,:Nom_User)'
                );
                $query->execute([
                    'id_user' => $id_user,
                    'id_post' => $id,
                    'message' =>$message,
                    'Nom_User'=>$Nom
                ]);
                echo "Posted Successfully";
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
}
function Get_Comment ($id)
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM comment WHERE id= :id'
                );
                $query->execute([
                    'id' => $id
                ]);
                return $query->fetchAll();
            } catch (PDOException $e) {
                $e->getMessage();
            }
        }


function  deletecomment($id)
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM comment WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
                $e->getMessage();
            }
}


function  affichertoutposts($tri)
{
   try {
                $pdo = getConnexion();
                if ($tri==="DA"){
                $query = $pdo->prepare(
                    'SELECT * FROM review_post ORDER BY date_p ASC'
                );}
                if ($tri==="DS"){
                $query = $pdo->prepare(
                    'SELECT * FROM review_post ORDER BY date_p DESC'
                );}
                if ($tri==="NA"){
                $query = $pdo->prepare(
                    'SELECT * FROM review_post ORDER BY Titre ASC'
                );}
                if ($tri==="ND"){
                $query = $pdo->prepare(
                    'SELECT * FROM review_post ORDER BY Titre DESC'
                );}
                if ($tri===""){
                $query = $pdo->prepare(
                    'SELECT * FROM review_post'
                );}
                $query->execute();
                return $query->fetchAll();}
            catch (PDOException $e) {
              echo  $e->getMessage();
            }
}
function  afficheronepost($id)
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'SELECT * FROM review_post WHERE id = :id'
                );
                $query->execute(['id' => $id]);
                return $query->fetchAll();
              }
            catch (PDOException $e) {
              echo  $e->getMessage();
            }
}
function count_Number_blogs()
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'COUNT(SELECT * FROM review_post)'
                );
                $query->execute();
                return $query->fetchAll();
              }
            catch (PDOException $e) {
              echo  $e->getMessage();
            }
}
function count_Number_comm()
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'COUNT(SELECT * FROM comment)'
                );
                $query->execute();
                return $query->fetchAll();
              }
            catch (PDOException $e) {
              echo  $e->getMessage();
            }
}




?>
