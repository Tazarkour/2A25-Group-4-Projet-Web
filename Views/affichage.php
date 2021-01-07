<?php
require_once "../Controller/BlogC.php";
require_once "../model/bloc.php";
if (isset ($_GET["search"]))
$search=$_GET["search"];
else $search="";
if( isset($_GET["tri"]))
{
  $tri=$_GET["tri"];
}
else $tri="";
 if (isset($_POST['id'])) {

      $id=$_POST['id'];


        deletePost($id);
    


    }
    $list=affichertoutposts($tri);
?>
<form method="GET" action="Affichertoutposts.php">
  <label class="sr-only" for="search">Search</label>
            <input style="margin: 5px;" size="20" class="form-control" type="text" name="search" id="search">
            <input style="margin: 5px;"  class="btn btn-primary" type="submit" value="Search">
            </form>
            <a href="Affichertoutposts.php?tri=DA&search=<?php echo $search ;?>">Date ASC</a>
            ,
            <a href="Affichertoutposts.php?tri=DS&search=<?php echo $search ;?>">Date DSC</a>
            ,
            <a href="Affichertoutposts.php?tri=NA&search=<?php echo $search ;?>">Alphabetique ASC</a>
            ,
            <a href="Affichertoutposts.php?tri=ND&search=<?php echo $search ;?>">Alphabetique DSC</a>
            

<table border=3 align = 'center'>
  <thead> 
      <tr style="text-align: center;"  >

        <th  style="text-align: center; padding: 10px ;width: 250px ; font-size: 20px  "> Titre </th>
        
        <th   style="text-align: center; width: 250px; font-size: 20px ">date</th>
        <th  style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Voir Les Commentaires</th>

      </tr>
</thead>
<?PHP
if (isset($search) && !empty($search))
{
  foreach($list as $userc)
        {
          if (strpos($userc['Titre'],$search)!==false)
      {
      ?>
        <tr >

          <td align="center" ><?PHP echo $userc['Titre']; ?></td>
          <td align="center"><?PHP echo $userc['date_p']; ?></td>>
          <td  align="center">
            <form method="POST" action="Affichertoutposts.php"  >
            <input style="margin: 5px; "  class="btn btn-danger"  type="submit" name="supprimer" value="Supprimer" >
            <input type="hidden" value= "<?PHP echo $userc['id']; ?>" name="id" id="id">
            </form>
          </td>

          <td align="center" >
            <form method="POST" action="Modifier Post.php">
            <input style="margin: 5px;"  class="btn btn-warning" type="submit" name="modifier" value="Modifier">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
           <td align="center" >
            <form method="GET" action="read_post.php">
            <input style="margin: 5px;"  class="btn btn-primary" type="submit" name="modifier" value="Voir">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          </tr>
      <?PHP
}
  }}
else
{
        foreach($list as $userc)
        {

      ?>
        <tr style="color:  red"  >

          <td align="center" ><?PHP echo $userc['Titre']; ?></td>
          <td align="center"><?PHP echo $userc['date_p']; ?></td>>
          <td  align="center">
            <form method="POST" action="Affichertoutposts.php"  >
            <input style="margin: 5px; "  class="btn btn-danger"  type="submit" name="supprimer" value="Supprimer" >
            <input type="hidden" value= "<?PHP echo $userc['id']; ?>" name="id" id="id">
            </form>
          </td>

          <td align="center" >
            <form method="POST" action="Modifier Post.php">
            <input style="margin: 5px;"  class="btn btn-warning" type="submit" name="modifier" value="Modifier">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
           <td align="center" >
            <form method="GET" action="read_post.php">
            <input style="margin: 5px;"  class="btn btn-primary" type="submit" name="modifier" value="Voir">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          </tr>
      <?PHP
        }}
      ?>