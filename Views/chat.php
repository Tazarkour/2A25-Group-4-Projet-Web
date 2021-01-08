<?php
session_start();
if(!isset($_SESSION['id']))
{
echo "<script>document.location.href = 'Login.php';
alert('Connectez-vous');
</script>";
}

if($_SESSION['role'] == 'Admin')
{
echo "<script>document.location.href = 'chatAdmin.php';
</script>";
}

?>
<?php
//include '../../DB/ConfigGate.php';
include '../Core/UserCore.php';
$userC= new UserCore();
$listUsers=$userC->afficherUsersExceptMe($_SESSION['id']);




?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
      <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chat</title>
    <meta name="description" content="Fresca is a free, open source Bootstrap 4 theme" />
    <meta name="generator" content="Themestr.app">
    <link rel="icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="http://themes.guide/favicon.ico" type="image/x-icon" />
    <meta property="og:image" name="twitter:image" content="http://bootstrap.themes.guide/assets/ss_fresca.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@ThemesGuide">
    <meta name="twitter:creator" content="@ThemesGuide">
    <meta name="twitter:title" content="Open-source Bootstrap 4 Themes">
    <meta name="twitter:description" content="Download Fresca - free, open source Bootstrap 4 theme by Themes.guide">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/3.0.0/css/ionicons.css" rel="stylesheet">
    <link href="./theme.css" rel="stylesheet">
    <link href="./template.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" type="text/css" rel="stylesheet">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../Assets/CSS/Chatbox.css">

</head>
 <body data-spy="scroll" data-target="#navbar1" data-offset="60">
    <br>
    <br>
    <div class="container">
<h3 class=" text-center"> <br>
</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Utilisateurs</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <input type="text" id="destinatairemsg" hidden="hidden">
            <input type="text" id="scrolled" value="true" hidden="hidden">
            <input type="text" id="scrollheight" hidden="hidden">
            <input type="text" id="scrollheightnew" hidden="hidden">
          <div class="inbox_chat">
            
            
            <?php foreach ($listUsers as $row) {
             ?>

             <div class="chat_list" id="<?=$row['id']?>" class="user">
              <div class="chat_people" id="<?=$row['id']?>" class="user">
                <div class="chat_img" id="<?=$row['id']?>" class="user"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil" id="<?=$row['id']?>" class="user"> </div>
                <div class="chat_ib">
                  <h5 ><a  id="<?=$row['id']?>" class="user"><?=$row['nom']." ".$row['prenom']?></a><span class="chat_date"></span></h5>
                  <p id="<?=$row['id']?>" class="user"><?=$row['role']?></p>
                  <p  id="<?=$row['id']?>" class="user"><span style="color: red;" id="<?=$row['id']?>xd">
                    <?=$row['count(m.id)']?> </span> nouveaux messages</p>
                </div>
              </div>
            </div>
        <?php } ?>




          </div>
        </div>
        <div class="mesgs">
         <div class="msg_history" onscroll="MarkScrolled()">
         </div>
          <div class="type_msg" style="visibility: hidden;">
            <div class="input_msg_write">
              <input type="text" class="write_msg" placeholder="Type a message" id="inputcontenu" />
              <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o sendmsg"  aria-hidden="true"></i></button>
            </div>
          </div> 
        </div>
      </div>
      
      
   
      
    </div></div>
    </header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-primary" id="navbar1">
        <div class="container">
            <a class="navbar-brand mr-1 mb-1 mt-0" href="logout.php">LOG OUT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse justify-content-center" id="collapsingNavbar">
                <ul class="navbar-nav">

                </ul>
                <ul class="navbar-nav ml-auto">
          <?php if($_SESSION['role'] == 'Patient') { ?>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="reclamation.php">Reclamation</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 
    
        
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.13.0/umd/popper.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="scripts.js"></script>
</body>
</html>
<script type="text/javascript">
function LoadUsers() {
    $.ajax({
            url:'../Core/GetUsers.php',
            data:{"source":<?=$_SESSION['id']?>},
            type:'get',
            dataType:"JSON",
            success:function(result){
                 var arr = result;
                 var myJSON = JSON.stringify(arr);
                 var tab=$.parseJSON(myJSON);
                 for (var i = 0; i < tab.length; i++) 
                 {
                    document.getElementById(tab[i].id+"xd").innerHTML=tab[i].count; 
                 }
                 
            },
            error:function(){},
            complete: function (data) {}

        });
    
}   


</script>


<script type="text/javascript">
    function Loadmsg(i) {
    $.ajax({
            url:'../Core/GetMessages.php',
            data:{"source":<?=$_SESSION['id']?>,"destinataire":i},
            type:'get',
            dataType:"JSON",
            success:function(result){
                 var arr = result;
                 var myJSON = JSON.stringify(arr);
                 var tab=$.parseJSON(myJSON);
                 $(".msg_history").empty();
                 for (var i = 0; i < tab.length; i++) {
                    if(tab[i].source==<?=$_SESSION['id']?>)
                    {
                        $(".msg_history").append('<div class="outgoing_msg"><div class="sent_msg"><p class="contenu" >'+tab[i].contenu+'</p><span class="time_date">'+tab[i].date+'</span></div></div>');
                    }
                    else
                    {
                        $(".msg_history").append('<div class="incoming_msg"><div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div><div class="received_msg"><div class="received_withd_msg"><p class="contenu">'+tab[i].contenu+'</p><span class="time_date">'+tab[i].date+'</span></div></div></div>');
                    }
                 }
                 
                 if($("#scrolled").val()=="true")
                 {
                    $('.msg_history').scrollTop($('.msg_history')[0].scrollHeight);
                 }
                 $("#scrollheight").val($(".msg_history").scrollTop());
                 MarkRead($('#destinatairemsg').val());
            },
            error:function(){},
            complete: function (data) {}

        });
    
}
</script>
<script type="text/javascript">
    function MarkRead(i)
    {
        $.ajax({
            url:'../Core/MarkRead.php',
            data:{"source":i,"destinataire":<?=$_SESSION['id']?>},
            type:'get',
            
            success:function(result){
                
            },
            error:function(){},
            complete: function (data) {}

        });

    }


</script>
<script type="text/javascript">
    function Sendmsg()
    {
    
        
         $.ajax({
            url:'../Core/SendMessage.php',
            data:{"source":<?=$_SESSION['id']?>,"destinataire":$('#destinatairemsg').val(),"contenu":$('#inputcontenu').val()},
            type:'get',
            success:function(result){
                    
                    Loadmsg($('#destinatairemsg').val());
                    $('#inputcontenu').val("");

            },
            error:function(){
        
            },
            

        });
    }
</script>



<script type="text/javascript">
    $(".user").click(function(){
        var i=$(this).attr('id');
        $('#destinatairemsg').val(i);
        Loadmsg(i);
        $('.type_msg').css("visibility","visible");


    });

    $(".sendmsg").click(function(){
        Sendmsg();

    });
    $("#inputcontenu").on('keypress',function(e) {
    if(e.which == 13) {
       Sendmsg();
    }
});

setInterval(function() {Loadmsg($('#destinatairemsg').val());LoadUsers(); }, 1000);
</script>

<script type="text/javascript">
    function MarkScrolled()
    {
        
          if ($(".msg_history").scrollTop() < $("#scrollheight").val()) {
            
            $("#scrolled").val("false");
  } 
  $("#scrollheightnew").val($(".msg_history").scrollTop());
    }
</script>