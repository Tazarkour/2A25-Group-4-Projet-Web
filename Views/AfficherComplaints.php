<?php
require_once "../Controller/RatingsC.php";


 if (isset($_POST['id']) && isset($_POST['supprimer'])) {

      $id=$_POST['id'];
      echo $id;

       Supprimer($id);
    


    }
    if (isset($_POST["id"]) && isset ($_POST["titre"]) && isset ($_POST["Message"]) && isset ($_POST["Type"]) && isset ($_POST["Checked"]) && isset ($_POST["modifier"]))
    {
      Modifier($_POST["titre"], $_POST["Type"],$_POST["Message"],$_POST["id"],$_POST["Checked"]);
    }
    
    $list=AfficherComplaints();
?>

<table border=3 align = 'center'>
  <thead> 
      <tr style="text-align: center;"  >

        <th  style="text-align: center; padding: 10px ;width: 250px ; font-size: 20px  "> Titre </th>
        
        <th   style="text-align: center; width: 250px; font-size: 20px ">Description</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">User</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Type</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Checked ?</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Date</th>
                 <th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>

          <th style="text-align: center; width: 250px; font-size: 20px ">View</th>

      </tr>
</thead>
<?PHP
        foreach($list as $Complaints)
        {
      ?>
        <tr>
<form method="POST" action="AfficherComplaints.php">
          <td align="center" ><input name="titre" value="<?PHP echo $Complaints['Titre']; ?>"></td>
          <td align="center"><input name="Message" value="<?PHP echo $Complaints['Message']; ?>"></td>
          <td align="center"><?PHP echo $Complaints['nom_user']; ?></td>>
          <td align="center"><input name="Type" value="<?PHP echo $Complaints['Type']; ?>"></td>>
          <td align="center"><input name="Checked" value="<?PHP echo $Complaints['Checked']; ?>"></td>>
          <td align="center"><?PHP echo $Complaints['Date']; ?></td>>
          

          <td align="center" >
            
            <input style="margin: 5px;"  class="btn btn-warning" type="submit" name="modifier" value="modifier">
            <input  type="hidden" value= "<?PHP echo $Complaints['id']; ?>" id="id" name="id">
            </form>
          </td>
          <td  align="center">
            <form method="POST" action="AfficherComplaints.php"  >
            <input style="margin: 5px; "  class="btn btn-danger"  type="submit" name="supprimer" value="supprimer" >
            <input type="hidden" value= "<?PHP echo $Complaints['id']; ?>" name="id" id="id">
            </form>
          </td>
          <td align="center" >
            <a style="margin: 5px;" href="Read_Complaint.php&id=<?php echo $Complaints['id']; ?>"  class="btn btn-primary" type="submit" name="pic" value="Picture">View</a>
          </td>
          </tr>
      <?PHP
        }
      ?>