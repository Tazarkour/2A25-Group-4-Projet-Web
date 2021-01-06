
<!DOCTYPE html>
<html>
<?php session_start();
?>
    <head>
   <meta charset="utf-8">
  <title>RADISSON BLU</title>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="../assets/css/main.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
   <link rel = "icon" href = "../assets/img/logo.png" type = "image/png">
    </head>
    <body>
    
  <!-- header -->
   <header class = "header" id = "header">
   <div class = "head-top">
   <div class = "site-name">
    <span>RADISSON BLU</span>
    </div>
    <div class = "site-nav">
    <span id = "nav-btn">MENU <i class = "fas fa-bars"></i></span>
    </div>
    </div>
   <div class = "head-bottom flex">
   <h2>NICE AND COMFORTABLE PLACE TO STAY</h2>
   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est quos veniam impedit numquam itaque voluptatum, dicta asperiores accusamus, eligendi neque ut incidunt, modi harum molestiae atque natus officia minima.</p>

    <button type = "button" class = "head-btn" onclick="bouton()">GET STARTED</button>
    </div>
    </header>
    <!-- end of header -->

   <!-- side navbar -->
   <div class = "sidenav" id = "sidenav">
    <span class = "cancel-btn" id = "cancel-btn">
    <i class = "fas fa-times"></i>
    </span>
    <ul class = "navbar">
    <li><a href = "#header">home</a></li>
   <li><a href = "#services">services</a></li>
   <li><a href = "WatchBlogPost.php">Blog</a></li>
   <li><a href = "form.php">acttivité</a></li>
   <li><a href = "#services">services</a></li>
    <li><a href = "#rooms">rooms</a></li>
    <?php if (isset($_SESSION["e"]))
    {

    echo "<li><a href = 'DashboardUser.php'>Account</a></li>";
       
    } if (isset($_SESSION["role"]) && $_SESSION["role"]=="admin")
    {

  echo "<li><a href = 'DashboardAdmin.php'>Admin Space</a></li>";


}

 if (!isset($_SESSION["e"]))
    {


 echo "<a class = 'btn sign-up' href='signup.php'>sign up</a>";
  echo  "<a class = 'btn log-in' href='signin.php'>log in</a>";
    
    
    }

?>
</ul>

    </div>
    <!-- end of side navbar -->

    <!-- fullscreen modal -->
    <div id = "modal"></div>
    <!-- end of fullscreen modal -->
    <!-- body content  -->
   <section class = "services sec-width" id = "services">
   <div class = "title">
   <h1>Nos Services</h1>
    </div>
  <div class = "services-container">
   <!-- single service -->
   <article class = "service">
    <div class = "service-icon">
    <span>
   <i class = "fas fa-utensils"></i>
    </span>
    </div>
    <div class = "service-content">
   <h2>Restaurant et Bars</h2>
   <p>Vivez une expérience inoubliable dans l’un de nos quatre restaurants proposant une vaste gamme de délices. Commencez votre journée avec un buffet de petit-déjeuner dans le restaurant Céramique, puis dégustez les délices de notre chef dans l’un de nos restaurants à la carte proposant différentes spécialités : des fruits de mer au restaurant Turquoise à des plats italiens au Zafferano, en passant par de la cuisine andalouse et locale au Flamingo. En outre, nos six bars proposent une vaste gamme de cocktails.!</p>
     <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-swimming-pool"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Piscines</h2>
                        <p>Piscine d'eau douce, Piscine pour enfants, Piscine intérieure (chauffée en hiver), avec jacuzzi et bassin pour enfants</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-broom"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Housekeeping</h2>
                        <p>Vous Pouvez être sure que les chambres seront bien netyoyée, idk nektbouh later</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
                <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-door-closed"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2>Room Security</h2>
                  <p>Nous tenons à las securité de nos clients et à la sécurité de leurs posséssions,
                  chaque chambre est disposé d'un coffre pour protéger vos biens et chaque chambre 
              est sécurisé par une carte magnetique et une poigné inpenetrable pour conserver votre intimité.</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
                <!-- end of single service -->
				
				 <!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-mug-hot"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2><p>café</p></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
				
				
				<!-- single service -->
                <article class = "service">
                    <div class = "service-icon">
                        <span>
                            <i class = "fas fa-rss"></i>
                        </span>
                    </div>
                    <div class = "service-content">
                        <h2><p>Wifi gratuit</p></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias blanditiis tempore officia accusamus asperiores. Illum maxime eligendi necessitatibus laudantium iste nisi pariatur doloremque ut illo similique voluptatum enim distinctio perferendis, ad ipsam aspernatur omnis rem autem ex, reiciendis corporis suscipit!</p>
                        <button type = "button" class = "btn">Know More</button>
                    </div>
                </article>
				
				
				
				
            </div>
        </section>
              
<section class = "rooms sec-width"  id = "rooms">
            <div class = "title">
                <h2>Services</h2>
                <?php include_once "scroll.html";
                ?>
            </div> 
         </section>  
        

        <section class = "rooms sec-width" id = "rooms">
            <div class = "title">
                <h2>rooms</h2>
            </div>
            <div class = "rooms-container">
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img src = "../assets/img/t0.jpg" alt = "room image">
                    </div>
                    <div class = "room-text">
                        <h3>Luxury Rooms</h3>
                        <ul>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem repellendus maxime ullam tempore architecto provident unde expedita quam beatae, dolore eligendi molestias sint tenetur incidunt voluptas. Unde corporis qui iusto vitae. Aut nesciunt id iste, cum esse commodi nemo?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla corporis quasi officiis cumque, fugiat nostrum sunt, tempora animi dicta laborum beatae ratione doloremque. Delectus odio sit eius labore, atque quo?</p>
                        <p class = "rate">
                            <span>TND138.4 /</span> Per Night
                        </p>

                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img src = "../assets/img/t1.jpg" alt = "room image">
                    </div>
                    <div class = "room-text">
                        <h3>Luxury Rooms</h3>
                        <ul>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem repellendus maxime ullam tempore architecto provident unde expedita quam beatae, dolore eligendi molestias sint tenetur incidunt voluptas. Unde corporis qui iusto vitae. Aut nesciunt id iste, cum esse commodi nemo?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla corporis quasi officiis cumque, fugiat nostrum sunt, tempora animi dicta laborum beatae ratione doloremque. Delectus odio sit eius labore, atque quo?</p>
                        <p class = "rate">
                            <span>TND138.4 /</span> Per Night
                        </p>

                    </div>
                </article>
                <!-- end of single room -->
                <!-- single room -->
                <article class = "room">
                    <div class = "room-image">
                        <img src = "../assets/img/t2.jpg" alt = "room image">
                    </div>
                    <div class = "room-text">
                        <h3>Luxury Rooms</h3>
                        <ul>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                            <li>
                                <i class = "fas fa-arrow-alt-circle-right"></i>
                                Lorem ipsum dolor sit amet.
                            </li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus exercitationem repellendus maxime ullam tempore architecto provident unde expedita quam beatae, dolore eligendi molestias sint tenetur incidunt voluptas. Unde corporis qui iusto vitae. Aut nesciunt id iste, cum esse commodi nemo?</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla corporis quasi officiis cumque, fugiat nostrum sunt, tempora animi dicta laborum beatae ratione doloremque. Delectus odio sit eius labore, atque quo?</p>
                        <p class = "rate">
                            <span>$99.00 /</span> Per Night
                        </p>
                    </div>
                </article>
                <!-- end of single room -->
            </div>
        </section>
        <section class = "rooms sec-width"  id = "rooms">
            <div class = "title">
                <h2>Services</h2>
                <?php include_once "scrollA.html";
                ?>
            </div> 
         </section>  


        <section class = "customers" id = "customers">
            <div class = "sec-width">
                <div class = "title">
                    <h2>customers</h2>
                </div>
                <div class = "customers-container">
                    <!-- single customer -->
                    <div class = "customer">
                        <div class = "rating">
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "far fa-star"></i></span>
                        </div>
                        <h3>We Loved it</h3>
                        <p>Great staff at swiming pool and young Ali - who helped us to play voleyball - simply super! , A great man for water aerobics, They made us a volleyball court, brought a subwoofer, and delivered bottled water and drinks every day,</p>
                        <img src = "../assets/img/customor1.jpg" alt = "customer image">
                        <span>Samir, Country</span>
                    </div>
                    <!-- end of single customer -->
                    <!-- single customer -->
                    <div class = "customer">
                        <div class = "rating">
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "far fa-star"></i></span>
                        </div>
                        <h3>Comfortable Living</h3>
                        <p>This is a comfortable Radisson hotel. All facilities were good and there was an amazing selection in Ceramique restaurant both for breakfast and dinner, including local and international dishes. However, our final night was interrupted by an alarm which went off at 04.30 in the next room</p>
                        <img src = "../assets/img/customor2.jpg" alt = "customer image">
                        <span>Customer Name, Country</span>
                    </div>
                    <!-- end of single customer -->
                    <!-- single customer -->
                    <div class = "customer">
                        <div class = "rating">
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "fas fa-star"></i></span>
                            <span><i class = "far fa-star"></i></span>
                        </div>
                        <h3>Excellent</h3>
                        <p>This is a very good hotel. All Staff is so attentive. They do more than their best to assist with a smile. Food and other services are also good. I would especially thank Mohamad, Husseim, Ahmed and Mohamad Ali from reception for their special help. We really loved to be there.</p>
                        <img src = "../assets/img/customor3.jpg" alt = "customer image">
                        <span>Customer Name, Country</span>
                    </div>
                    <!-- end of single customer -->
                </div>
            </div>
        </section>
        <!-- end of body content -->
        
        <!-- footer -->
        <footer class = "footer">
            <div class = "footer-container">
                <div>
                    <h2>About Us </h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque sapiente mollitia doloribus provident? Eos quisquam aliquid vel dolorum, impedit culpa.</p>
                    <ul class = "social-icons">
                        <li class = "flex">
                            <i class = "fa fa-twitter fa-2x"></i>
                        </li>
                        <li class = "flex">
                            <i class = "fa fa-facebook fa-2x"></i>
                        </li>
                        <li class = "flex">
                            <i class = "fa fa-instagram fa-2x"></i>
                        </li>
                    </ul>
                </div>

                <div>
                    <h2>Useful Links</h2>
                    <a href = "#">Blog</a>
                    <a href = "#">Rooms</a>
                    <a href = "#">Subscription</a>
                    <a href = "#">Gift Card</a>
                </div>

                <div>
                    <h2>Privacy</h2>
                    <a href = "#">Career</a>
                    <a href = "#">About Us</a>
                    <a href = "#">Contact Us</a>
                    <a href = "#">Services</a>
                </div>

                <div>
                    <h2>Have A Question</h2>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-map-marker-alt"></i>
                        </span>
                        <span>
                            203 Fake St.Mountain View, San Francisco, California, USA
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-phone-alt"></i>
                        </span>
                        <span>
                            +84545 37534 48
                        </span>
                    </div>
                    <div class = "contact-item">
                        <span>
                            <i class = "fas fa-envelope"></i>
                        </span>
                        <span>
                            info@domain.com
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end of footer -->
        
        <script src="../assets/js/script.js"></script>
    </body>
</html>