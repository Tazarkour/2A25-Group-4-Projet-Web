<?php
require_once "../Controller/BlogC.php";
require_once "../model/bloc.php";


 if (isset($_POST['id'])) {

      $id=$_POST['id'];


        deletePost($id);
    


    }
    $list=affichertoutposts();
?>

<table border=3 align = 'center'>
  <thead> 
      <tr style="text-align: center;"  >

        <th  style="text-align: center; padding: 10px ;width: 250px ; font-size: 20px  "> Titre </th>
        
        <th   style="text-align: center; width: 250px; font-size: 20px ">date</th>
        <th  style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>

      </tr>
</thead>
<?PHP
        foreach($list as $userc)
        {
      ?>
        <tr style="color:  red"  >

          <td align="center" ><?PHP echo $userc['Titre']; ?></td>
          <td align="center"><?PHP echo $userc['date_p']; ?></td>>
          <td  align="center">
            <form method="POST" action="Affichertoutposts.php"  >
            <input style="margin: 5px; "  class="btn btn-danger"  type="submit" name="supprimer" value="supprimer" >
            <input type="hidden" value= "<?PHP echo $userc['id']; ?>" name="id" id="id">
            </form>
          </td>

          <td align="center" >
            <form method="POST" action="Modifier Post.php">
            <input style="margin: 5px;"  class="btn btn-warning" type="submit" name="modifier" value="modifier">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          </tr>
      <?PHP
        }
      ?>