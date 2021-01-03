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
            if (isset($_POST["password"]) && isset($_POST["password2"])&& isset($_POST["passwordA"])) 
            {$MDP=$_POST["password"];
                if($_POST["passwordA"]==$_SESSION["Password"])
                {if ($_POST["password"]!=$_POST["password2"])
                    echo "Les deux mot de passes sont differents";
                else
                {
                    
                    
                    
                        updateUmdp($MDP, $id);
                        disconnect();
                         echo("<script>location.href = 'signin.php';</script>");
                    
                }
                
            } else echo "l'ancien mot de passe est faux";
        }
            foreach ($list as $Old_User) {?>
            <form class="form-detail" action="ModifyUserPass.php" method="post">
                <h2>Register Account Form</h2>
                <div class="form-row">
                    <label for="password">Entrer l'encient Mot de Passe</label>
                    <input type="password" name="passwordA" id="passwordA" class="input-text" placeholder="Mot de Passe" required>
                    <i class="fas fa-lock"></i>
                </div>
                 <div class="form-row">
                    <label for="password">Entrer le nouveau Mot de Passe</label>
                    <input type="password" name="password" id="password" class="input-text" placeholder="Mot de Passe" required>
                    <i class="fas fa-lock"></i>
                </div>
                <div class="form-row">
                    <label for="password">Confirmer Votre Nouveau Mot De passe</label>
                    <input type="password" name="password2" id="password2" class="input-text" placeholder="Confirmer Votre Mot De passe"  required>
                    <i class="fas fa-lock"></i>
                </div>
                <br>
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