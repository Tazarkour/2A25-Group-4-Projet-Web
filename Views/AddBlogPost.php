<?php
require "../Controller/BlogC.php";
require "../model/bloc.php";


    if (isset($_POST['name']) && isset($_POST['post']) && isset(($_FILES["image"]))) {
        if (!empty($_POST["name"]) && !empty($_POST["post"]) && !empty(basename($_FILES["image"]["name"])))
        {echo "rerere";
        include "../file_upload.php";
        $post =  new post();
        $post->nom = $_POST["name"];
        $post->text = $_POST["post"];
        $post->picture = basename($_FILES["image"]["name"]);
        echo $post->picture; 
        addReveiw($post);}
        if (empty($_POST["name"]))
            echo 'inserer un titre';
        if (empty($_POST["post"]))
            echo 'inserer un texte';
        if (empty(basename($_FILES["image"]["name"])))
            echo "pas d'image";
        /*sendmail ();*/

    


}

?>
<!DOCTYPE html>
<html>
<script src="../Assets/Controledesaisiejs/Control_Blog.js"></script>
    <head>
        <meta charset="utf-8"/>
        <title>Inscription</title>
        <script src="script.js"></script>
    </head>
<body>
<h1>Post</h1>    
    <form NAME="f" action="blank.php" method="POST" enctype="multipart/form-data" >
    <table border="1" width="80%">
        <tr>
            <th align="left" rowspan ="8">
            </th>
            <th align="left">
                <label for="name">Title:
        </label>
            </th>
            <th align="left">
        <input type="text" id="name" name="name" maxlength="25" size="20" placeholder="Titre" required onkeyup="EnableDisable(this)">
            </th>
        </tr>
        <tr>
            <th align="left">
                <label for="comment">Text:
        </label>
            </th>
            <th align="left">
        <textarea name="post" id="post" cols="30" rows="5" maxlength="200" onkeyup="EnableDisable(this)">
                </textarea>
            </th>
        </tr>
          <tr>
            <th align="left">
            </th>
        </tr>
          <tr>
            <th align="left">
                <label for="name" >Picture:
        </label>
            </th>
            <th align="left">
        <input type="file"  name="image" id="image"  required onkeyup="EnableDisable(this)">
            </th>
        </tr>
                    
        <tr>
            <th align="left">
            </th>
            <th align="left">
                <button type="submit" name="submit" id="submit" class="btn btn-success" disabled>Envoyer</button>
            </th>
        </tr>
    </table>
</form>
    
    </body>
    
</html>    
    