<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="static/nav1.css">
    <link rel="stylesheet" href="static/style2.css">
    <link rel="script" href="static/script.js">
    <link rel="requests" href="static/script.js">
    <script src="static/requests.js"></script>
    <link rel="icon" href="static/images/logo.ico">
    <!-- for using google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <!-- for using google font -->
    <title>Where in addis?</title>
</head>
<body>
<header id="nav">
        <a id="logo" href="index.php#populartags"><b>WHERE IN ADDIS?</b></a>
        <div class="navigation">
        
            <ul>
                <li class="list active">
                    <a href="index.php#mainhome">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="text"> Home</span>
                    </a>
                </li>
                <li class="list">
                    <a href="index.php#populartags">
                        <span class="icon">
                            <ion-icon name="location-outline"></ion-icon>
                        </span>
                        <span class="text"> Popular</span>
                    </a>
                </li>
                <li class="list">
                    <a href="index.php#restaurantags">
                        <span class="icon">
                            <ion-icon name="fast-food-outline"></ion-icon>
                        </span>
                        <span class="text"> Resturant</span>
                    </a>
                </li>
                <li class="list">
                    <a href="#contact_us">
                        <span class="icon">
                            <ion-icon name="call-outline"></ion-icon>
                        </span>
                        <span class="text"> Contact</span>
                    </a>
                </li>
                
        </div>
        </section>
        
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </header>


    
    <?php
        //  connect to place database
        $connection = mysqli_connect('localhost','root','','places');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
        }
        //  connect to place database
    ?>
    
    
        <section id="majorpart">
        <?php
            $ID = $_POST['ID'];
            
            $query ="SELECT * FROM `store` WHERE `id` = '".$ID."'";
            $query_run = mysqli_query($connection,$query );
            
            $row = mysqli_fetch_array($query_run);
            
            
            $source = 'data:image;base64,'.base64_encode($row['image']);?>
            <div class="big_img" style="background-image: url('<?php echo $source; ?>')">
            </div>
            <div class="info">
                <h1 id="h1"><?php print($row["Name"]);?></h1>
                <br><br>
                <p class="tag">Activities: </p>   <p id="activity"><?php print($row["activity"]);?></p>
                <br><br>
                <p class="tag">Location: </p>   <p id="location"><?php print($row["location"]);?></p>
                <br><br>
                <b class="tag">Type: </b>   <p id="type"><?php print($row["type"]);?></p>
                <br>
                <p  id="rate-tag">Rating: </p> 
                <div id="container">

                <?php $counter = 0?>
                <?php while ($counter < $row['rating']):?>
                    <img id="star" src="static/images/star.svg" >
                    <?php $counter++;?>
                <?php endwhile?>
                <?php while ($counter < 5):?>
                    <img id="star" src="static/images/star2.svg" >
                    <?php $counter++;?>
                <?php endwhile?>
                        
                    </div>
                    <br><br><br>
                    
                    <input class="like-dislike"type="button" value="I like this place" onclick="addrating('<?php echo($ID)?>','True')">
                    <input class="like-dislike"type="button" value="I don't like this place" onclick="addrating('<?php echo($ID)?>','False')">
        
                

            </div>
        </section>




       

        
        
        
    


    </section>
    
    <section  id="contact_us">
        
        <h2>Contact us</h2>
        <div class="contact-content">
            <div class="left">
               
                <div class="text">Keep in touch</div>
                     <br>
                      <div class="head">Name</div>
                      <div class="sub-title" >Feruz Ahmed <br> Blen Assefa <br> Kalkidan Belayneh</div>
                      <br><br>
                  
                      <div class="head">Address</div>
                      <div class="sub-title" >Addis Ababa, Ethiopia</div>
                      <br><br>
                  
                      <div class="head">Email</div>
                      <div class="sub-title"><a href="/cdn-cgi/l/email-protection" class="__cf_email__">Where_in_addis@yahoo.com </a></div>
                    
                      <br><br>
                  
                      <div class="head">Phone no.</div>
                      <div class="sub-title">+251 8783 321 64</div>
                    
            </div>
            <div class="right">
                <div class="text">Message us</div>
                    <form action="" method = "POST">
                      

                            <input type="text" placeholder="Name" name = "name" required>
                            
                            <input type="email" placeholder="Email" name = "_replyto" required>
                            
                        
                        
                            <input type="text" placeholder="Subject" name = "subject" required>
                        
                        
                            <textarea cols="30" rows="5" placeholder="Message.."  name = "message"required></textarea>
                       
                        
                            <button type="submit">Send message</button>
                        </div>
                    </form>
      </div>
            </div>
        </div>
      </section>
      
      <footer>
        <span>Created By <a href="#">Feruz Ahmed, Blen Assefa & Kalkidan Belayneh</a> | <span class="far fa-copyright"></span> &copy; 2022 All rights reserved.</span>
      </footer>
</body>
</html>