<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <link rel="script" href="static/script.js">
    <link rel="requests" href="static/script.js">
    <script src="static/requests.js"></script>
    <link rel="icon" href="static/images/logo.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Where in addis?</title>
</head>
<body>
    <header id="nav">
        <a id="logo" href="index.html#populartags"><b>WHERE IN ADDIS?</b></a>
        <div id="navlinks">
            <a href="index.html#mainhome">Home</a>
            <a href="index.html#populartags">Popular</a>
            <a href="index.html#restaurantags">Restaurants</a>
            <a href="#contact_us">Contact us</a>
        </div>
    </header>

    <section id="majorpart">
        <div class="big_img">

        </div>
        <div class="info">
            <?php
                //echo var_dump($_POST);
                $connection = mysqli_connect('localhost','root','','places');
                if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                    exit();
                    }
                $ID = $_POST['ID'];
                // echo $ID;
                $query ="SELECT * FROM `store` WHERE `id` = '".$ID."'";
                $query_run = mysqli_query($connection,$query );
                //var_dump($query_run) ;
                $row = mysqli_fetch_array($query_run);
                var_dump($row["Name"]);
                    ?>
                

        </div>
        
        
        
    </section>

    
    <section  id="contact_us">
        <div class="t"></div>
        <h2>Contact us</h2>
        <div class="contact-content">
            <div class="left">
               
                <div class="text">Keep in touch</div>
                     <br>
                      <div class="head">Name</div>
                      <div class="sub-title" >Feruz Ahmed & Blen Assefa</div>
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
        <span>Created By <a href="#">Feruz Ahmed & Blen Assefa</a> | <span class="far fa-copyright"></span> &copy; 2022 All rights reserved.</span>
      </footer>
</body>
</html>