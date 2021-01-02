<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Form-v5 by Colorlib</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="../Assets/css/roboto-font.css">
    <link rel="stylesheet" type="text/css" href="../Assets/fonts/font-awesome-5/css/fontawesome-all.min.css">
    <!-- Main Style Css -->
    <link rel="stylesheet" href="../Assets/css/style1.css"/>
</head>
<body class="form-v5">
    <div class="page-content">
        <div class="form-v5-content">
            <?php

            include "../Controller/UserC.php";
            require_once "../Model/User.php";   
            $id=$_SESSION["e"];
            $list=Get_one_User_Info ($id);
            if (isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["Date_N"]) && isset($_POST["sexe"]) && isset($_POST["email"]) && isset($_POST["Login"]) && isset($_POST["password"]) && isset($_POST["password2"])) 
            {
                $New_User=new User($_POST["nom"],$_POST["prenom"],$_POST["sexe"],$_POST["email"],$_POST["Date_N"],$_POST["Login"],$_SESSION["password"]);
                $facture=$_POST["facture"];
                if ($_POST["password"]!=$_POST["password2"])
                    echo "Les deux mot de passes sont differents";
                else
                {
                    Check_Info ($New_User->email,$New_User->login,$id);
                    if (Check_Info ($New_User->email,$New_User->login,$id))
                    {
                        updateUSER($New_User, $id, $facture);
                         echo("<script>location.href = 'Affichertoutusers.php';</script>");
                    }
                }
            } 
            foreach ($list as $Old_User) {?>
            <form class="form-detail" action="modifierUser.php" method="post">
                <h2>Register Account Form</h2>
                <div class="form-row">
                    <label for="full-name">Nom</label>
                    <input type="text" name="nom" id="nom" class="input-text" placeholder="Nom" value="<?php  echo $Old_User["Nom"]?>"required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-row">
                    <label for="full-name">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="input-text" placeholder="Prénom" value="<?php  echo $Old_User["Prenom"]?>" required>
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-row">
                    <label for="full-name">Sexe</label>
                    <select class="input-text" name="sexe" id="sexe" value="<?php  echo $Old_User["sexe"]?>">
                    <option value="Femme">Femme</option>
                    <option value="Homme">Homme</option>
                </select>
                </div>
                <div class="form-row">
                    <label for="your-email">Email</label>
                    <input type="text" name="email" id="email" class="input-text" placeholder="Email" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}" value="<?php  echo $Old_User["Email"]?>">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="form-row">
                    <label for="your-email">Date De Naissance</label>
                    <input type="date" name="Date_N" id="Date_N" value="<?php  echo $Old_User["Date_N"]?>" class="input-date" >
                </div>
                
                <br>
                <div class="form-row">
                    <label for="full-name">Login</label>
                    <input type="text" name="Login" id="Login" class="input-text" placeholder="Login" value="<?php  echo $Old_User["Login"]?>" required>
                    <i class="fas fa-user"></i>
                </div>
                    <input  type="hidden" value= "<?PHP echo $id; ?>" id="id" name="id">
                <div class="form-row-last">
                    <input type="submit" name="register" class="register" value="Modifier">
                </div>
            </form>
        <?php }?>
        </div>
    </div>
</body>
</html>