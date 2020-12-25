<?php
include "../config.php"
include "../config1.php"
function create_user($New_User)
{

                $pdo = getConnexion();
                $query = $pdo->prepare(
                    'INSERT INTO `utilisateur`(`Nom`, `Prenom`, `Email`, `Date_N`, `Facture`, `Picture`, `Login`, `Password`, `sexe`) VALUES (:Nom, :Prenom, :email, :Date_N, :Facture,:Picture , :login, :picture, :Password, :sexe)'
                );
                $query->execute([
                    'Nom' => $New_User->nom,
                    'Prenom' => $New_User->prenom,
                    'email' => $New_User->email,
                    'Date_N' => $New_User->date,
                    'Facture' => 0,
                    'Picture' => "Unknown.png",
                    'login' => $New_User->login,
                    'password' => $New_User->password,
                    'sexe' => $New_User->sexe,
                     
                ]);
                echo "Posted Successfully";
             catch (PDOException $e) {
                echo $e->getMessage();
            }


}

function Check_Info ($email,$Login)
{
   $conn = getConnexion1();
  if ($conn->connect_error) 
  {
      die("Connection failed: " . $conn->connect_error);
  }
  $sql="SELECT Login, Email FROM utilisateur WHERE Login=$Login OR Email=$email";
  $result = $conn->query($sql);
  if ($result->num_rows > 0)
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
  else return 1;
}






session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password1 = mysqli_real_escape_string($db, $_POST['password1']);
  $password2 = mysqli_real_escape_string($db, $_POST['password2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password1)) { array_push($errors, "Password is required"); }
  if ($password1 != $password2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>