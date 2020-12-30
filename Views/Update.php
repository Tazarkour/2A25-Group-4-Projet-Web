<?php
require "../Controller/BlogC.php";
require "../model/bloc.php";
        if (isset($_POST['id']))
        {
        $id=$_POST['id'];
         $post=afficheronepost($id);
    }

    if (isset($_POST['name']) && isset($_POST['post']) && isset($_POST['image']) && isset($_POST['id1'])) {
        $id=$_POST['id1'];
       
        update($post, $id);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Modification</title>
        <script src="script.js"></script>
    </head>
<body>
<h1>Post</h1>    
    <form NAME="f" action="Modifier Post.php" method="POST">
    <table border="1" width="50%">
        <tr>
            <th align="left" rowspan ="8">
            </th>
            <th align="left">
                <label for="name">Title:
        </label>
            </th>
            <th align="left">
        <input type="text" id="name" name="name" maxlength="25" size="20" value="<?php echo  $post["Titre"]?>" required>
            </th>
        </tr>
        <tr>
            <th align="left">
                <label for="comment">Text:
        </label>
            </th>
            <th align="left">
        <textarea name="post" id="post" cols="30" rows="5"  value="<?php  echo $post["message"]?>" maxlength="200">
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
        <input type="file" id="image" name="image"  value="<?php  echo $post["image"];?>" required>
            </th>
        </tr>
        <input value="<?php echo $id ?>" id="id1" name="id1" hidden>         
        <tr>
            <th align="left">
            </th>
            <th align="left">
                <button type="submit">Envoyer</button>
            </th>
        </tr>
    </table>
</form>
    
    </body>
    
</html>    
    