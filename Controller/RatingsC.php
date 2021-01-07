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