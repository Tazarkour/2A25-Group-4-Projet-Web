<?php
require_once "../Controller/UserC.php";
require_once "../Model/User.php";


 if (isset($_POST['id']) && isset($_POST['supprimer'])) {

      $id=$_POST['id'];


        deleteuser($id);
    


    }
     if (isset($_POST['id']) && isset($_POST['AdminP'])) {

      $id=$_POST['id'];



        permutadmin($id);
    


    }
     if (isset($_POST['id']) && isset($_POST['AdminC'])) {

      $id=$_POST['id'];



        permutclient($id);
    


    }
    if (isset($_POST['id']) && isset($_POST['pic'])) {

      $id=$_POST['id'];



       setpictodefault($id);
    


    }
    $list=Get_All_User_Info();
?>

<table border=3 align = 'center'>
  <thead> 
      <tr style="text-align: center;"  >

        <th  style="text-align: center; padding: 10px ;width: 250px ; font-size: 20px  "> Nom </th>
        
        <th   style="text-align: center; width: 250px; font-size: 20px ">Prénom</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Sexe</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Facture</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Email</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Date_N</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Picture</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Login</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Password</th>
        <th   style="text-align: center; width: 250px; font-size: 20px ">Role</th>
        <th  style="text-align: center; width: 250px; font-size: 20px ">Supprimer</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Modifier</th>
        <th style="text-align: center; width: 250px; font-size: 20px ">Permut To Admin</th>
         <th style="text-align: center; width: 250px; font-size: 20px ">Permut To Client</th>
          <th style="text-align: center; width: 250px; font-size: 20px ">Set Pic to default</th>

      </tr>
</thead>
<?PHP
        foreach($list as $userc)
        {
      ?>
        <tr style="color:  red"  >

          <td align="center" ><?PHP echo $userc['Nom']; ?></td>
          <td align="center"><?PHP echo $userc['Prenom']; ?></td>>
          <td align="center"><?PHP echo $userc['sexe']; ?></td>>
          <td align="center"><?PHP echo $userc['Facture']; ?></td>>
          <td align="center"><?PHP echo $userc['Email']; ?></td>>
          <td align="center"><?PHP echo $userc['Date_N']; ?></td>>
           <td align="center" style="padding: 10px ;"><?PHP echo "<img src="."../assets/img/".$userc['Picture']." width="."50"." height="."50".">"; ?></td>
          <td align="center"><?PHP echo $userc['Login']; ?></td>>
          <td align="center"><?PHP echo $userc['Password']; ?></td>>
          <td align="center"><?PHP echo $userc['Role']; ?></td>>
          <td  align="center">
            <form method="POST" action="Affichertoutusers.php"  >
            <input style="margin: 5px; "  class="btn btn-danger"  type="submit" name="supprimer" value="supprimer" >
            <input type="hidden" value= "<?PHP echo $userc['id']; ?>" name="id" id="id">
            </form>
          </td>

          <td align="center" >
            <form method="POST" action="ModifierUser.php">
            <input style="margin: 5px;"  class="btn btn-warning" type="submit" name="modifier" value="modifier">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          <td align="center" >
            <form method="POST" action="Affichertoutusers.php">
            <input style="margin: 5px;"  class="btn btn-success" type="submit" name="Admin" value="Admin">
            <input  type="hidden" value= "AdminP" name="AdminP" id="AdminP">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          <td align="center" >
            <form method="POST" action="Affichertoutusers.php">
            <input style="margin: 5px;"  class="btn btn-success" type="submit" name="Admin" value="Client">
            <input  type="hidden" value= "AdminC" name="AdminC" id="AdminC">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          <td align="center" >
            <form method="POST" action="Affichertoutusers.php">
            <input style="margin: 5px;"  class="btn btn-primary" type="submit" name="pic" value="Picture">
            <input  type="hidden" value= "Picture" name="pic" id="pic">
            <input  type="hidden" value= "<?PHP echo $userc['id']; ?>" id="id" name="id">
            </form>
          </td>
          </tr>
      <?PHP
        }
      ?>