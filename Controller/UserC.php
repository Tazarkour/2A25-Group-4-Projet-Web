<?php
include "../config.php";
include "../config1.php";
require_once "../Model/User.php";  
function user_creation ($New_User)
{
            try
              {
                $pdo = getConnexion();
                $zero=0;
                $query = $pdo->prepare(
                    'INSERT INTO utilisateur (Nom, Prenom, Email, Date_N, Login, Password, sexe) VALUES (:Nom, :Prenom, :email, :Date_N, :login, :Password, :sexe)'
                );
                $query->execute([
                    'Nom' => $New_User->nom,
                    'Prenom' => $New_User->prenom,
                    'email' => $New_User->email,
                    'Date_N' => $New_User->date,
                    'login' => $New_User->login,
                    'Password' => $New_User->password,
                    'sexe' => $New_User->sexe
                     
                ]);}
             catch (PDOException $e) {
                echo $e->getMessage();
            }


}

function Check_Info ($email,$Login,$id)
{
   $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT Login, Email FROM utilisateur WHERE (Login=$Login AND id!==$id) OR (Email=$email AND id !== $id)";
  $result = $conn->query($sql);
  if (isset($result->num_row))
  {if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      if (row["Login"]===$Login)
        echo "Login déja utilisé";
      if (row["Email"]===$email)
        echo "email déja utilisé";
    }
    return 0;
  }
  else return 1;}
  else return 1;
}


function verification_sign_in ($Login, $Password)
{
     $sql="SELECT * FROM utilisateur WHERE Login= :Login AND Password= :Password";
     $db=getConnexion();
     try{
      $query=$db->prepare($sql);
      $query->execute(['Login' => $Login,
                    'Password' =>  $Password]);
      $count=$query->rowCount();
      if ($count==0){
        return 0;
      }
      else
      {
        $x=$query->fetch();
        $User_info = new User ($x["Nom"],$x["Prenom"],$x["sexe"],$x["Email"],$x["Date_N"],$x["Login"],$x["Password"]);
        $User_info->id=$x["id"];

        return $User_info->id; 
      }}
      catch (Exception $e)
      {
        echo $e->getMessage();
      }
     

}

function Connect ($id)
{

    session_start();
    try{
      $sql="SELECT * FROM utilisateur WHERE id=:id";
      $db=getConnexion();
      $query=$db->prepare($sql);
      $query->execute(['id' => $id]);
      $count=$query->rowCount();
      $x=$query->fetch();
      $_SESSION['e']=$id;
      $_SESSION['Nom']= $x["Nom"];
      $_SESSION['Prenom']=$x["Prenom"];
      $_SESSION['Sexe']=$x["sexe"];
      $_SESSION['Email']=$x["Email"];
      $_SESSION['Date']=$x["Date_N"];
      $_SESSION['Login']=$x["Login"];
      $_SESSION['Password']=$x["Password"];
      $_SESSION['Facture']=$x["Facture"];
      $_SESSION['Picture']=$x["Picture"];
      $_SESSION['role']=$x["Role"];
    }  
    catch (Exception $e)
    {
      echo "error while connecting :";
      echo $e->getMessage();
      session_destroy();
    }
}

function Get_All_User_Info ()
{
     $sql="SELECT * FROM utilisateur";
     $db=getConnexion();
     try{
      $query=$db->prepare($sql);
      $query->execute();
      $count=$query->rowCount();
      if ($count==0){
        echo "Aucun Resultat";

      }
      else
      {
        $x=$query->fetchAll();
        return $x;
      }}
      catch (Exception $e)
      {
        echo $e->getMessage();
      }
}
function Get_one_User_Info($id)
{
     $sql="SELECT * FROM utilisateur where id=$id";
     $db=getConnexion();
     try{
      $query=$db->prepare($sql);
      $query->execute();
      $count=$query->rowCount();
      if ($count==0){
        echo "Aucun Resultat";

      }
      else
      {
        $x=$query->fetchAll();
        return $x;
      }}
      catch (Exception $e)
      {
        echo $e->getMessage();
      }
}

function deleteuser($id) {
            try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'DELETE FROM utilisateur WHERE id = :id'
                );
                $query->execute([
                    'id' => $id
                ]);
            } catch (PDOException $e) {
               echo $e->getMessage();
            }
        }
function  permutadmin($id)
{
            try {
                $pdo = getConnexion();
                $admin="admin";
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Role=:adm WHERE id = :id'
                );
                $query->execute(['id'=>$id,'adm'=>$admin]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
function  permutclient($id)
{
            try {
                $pdo = getConnexion();
                $admin="client";
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Role=:adm WHERE id = :id'
                );
                $query->execute(['id'=>$id,'adm'=>$admin]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
function  setpictodefault($id)
{
            try {
                $pdo = getConnexion();
                $admin="Unknown.png";
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Picture=:adm WHERE id = :id'
                );
                $query->execute(['id'=>$id,'adm'=>$admin]);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }        

function updateUSER($New_User, $id, $facture) {
            try
              {
                $pdo = getConnexion();
                $zero=0;
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Nom=:Nom, Prenom=:Prenom, Email=:email, Date_N=:Date_N, Login=:login, Password=:Password, sexe=:sexe, Facture=:Facture WHERE id=:id'
                );
                $query->execute([
                    'Nom' => $New_User->nom,
                    'Prenom' => $New_User->prenom,
                    'email' => $New_User->email,
                    'Date_N' => $New_User->date,
                    'login' => $New_User->login,
                    'Password' => $New_User->password,
                    'sexe' => $New_User->sexe,
                    'id'=> $id,
                    'Facture'=>$facture                     
                ]);}
             catch (PDOException $e) {
                echo $e->getMessage();
            }
    } 
    function updateUSERssmdp($New_User, $id) {
            try
              {
                $pdo = getConnexion();
                $zero=0;
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Nom=:Nom, Prenom=:Prenom, Email=:email, Date_N=:Date_N, Login=:login, sexe=:sexe WHERE id=:id'
                );
                $query->execute([
                    'Nom' => $New_User->nom,
                    'Prenom' => $New_User->prenom,
                    'email' => $New_User->email,
                    'Date_N' => $New_User->date,
                    'login' => $New_User->login,
                    'sexe' => $New_User->sexe,
                    'id'=> $id                    
                ]);}
             catch (PDOException $e) {
                echo $e->getMessage();
            }
    } 
     function updateUmdp($Pass, $id) {
            try
              {
                $pdo = getConnexion();
                $zero=0;
                $query = $pdo->prepare(
                    'UPDATE utilisateur SET Password=:Password WHERE id=:id'
                );
                $query->execute([
                    'Password' => $Pass,
                    'id'=> $id                  
                ]);}
             catch (PDOException $e) {
                echo $e->getMessage();
            }
    } 
    function disconnect()
    {

      session_start();
unset($_SESSION['e']);
unset($_SESSION['Nom']);
unset($_SESSION['Prenom']);
unset( $_SESSION['Sexe']);
unset($_SESSION['Email']);
unset($_SESSION['Date']);
unset($_SESSION['Login']);
unset($_SESSION['Password']);
unset($_SESSION['Facture']);
unset($_SESSION['role']);
session_destroy();
    }
    function count_Number_Users()
{
   try {
                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'COUNT(SELECT * FROM utilsateur WHERE role="admin")'
                );
                $query->execute();
                return $query->fetchAll();
              }
            catch (PDOException $e) {
              echo  $e->getMessage();
            }
}
?>