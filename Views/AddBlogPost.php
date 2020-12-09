<?php
require "../Controller/BlogC.php";
require "../model/bloc.php";


    if (isset($_POST['name']) && isset($_POST['post']) && isset($_POST['image'])) {
        $post =  new post();
        $post->nom = $_POST["name"];
        $post->text = $_POST["post"];
        $post->picture = $_POST["image"];
        addReveiw($post);
        sendmail ();
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Inscription</title>
        <script src="script.js"></script>
    </head>
<body>
<h1>Post</h1>    
    <form NAME="f" action="AddBlogPost.php" method="POST">
    <table border="1" width="50%">
        <tr>
            <th align="left" rowspan ="8">
            </th>
            <th align="left">
                <label for="name">Title:
        </label>
            </th>
            <th align="left">
        <input type="text" id="name" name="name" maxlength="25" size="20" placeholder="entrez votre nom" required>
            </th>
        </tr>
        <tr>
            <th align="left">
                <label for="comment">Text:
        </label>
            </th>
            <th align="left">
        <textarea name="post" id="post" cols="30" rows="5" maxlength="200">
                </textarea>
            </th>
        </tr>
          <tr>
            <th align="left">
            </th>
        </tr>
          <tr>
            <th align="left">
                <label for="name">Picture:
        </label>
            </th>
            <th align="left">
        <input type="file" id="image" name="image" required>
            </th>
        </tr>
                    
        <tr>
            <th align="left">
            </th>
            <th align="left">
                <button type="submit">Envoyer</button>
            </th>
             <th align="left">
                <button type="button">Annuler</button>
            </th>
        </tr>
    </table>
</form>
    
    </body>
    
</html>    
    