<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <script src="static/script.js"></script>
    <script src="static/requests.js"></script>
    <link rel="icon" href="static/images/logo.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Where in addis?</title>
</head>
<body>
    <header id="nav">
        <a id="logo" href="#populartags"><b>WHERE IN ADDIS?</b></a>
        <div id="navlinks">
            <a href="#mainhome">Home</a>
            <a href="#populartags">Popular</a>
            <a href="#restaurantags">Restaurants</a>
            <a href="#contact_us">Contact us</a>
        </div>
    </header>
    <?php
           
        $connection = mysqli_connect('localhost','root','','places');
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            exit();
            }?>
                 
    <section id="mainhome">
        
        <div class="text">
        <div id="intro">
           Not sure where to have fun,,,,
            <br>well we are here to rescue you!!!
            <a id="inner" href="#maintags">Pick random place</a>
            </div>
        </div>
        <div class="images">
            <div class="photo"id="photo4"></div>
            <div class="photo"id="photo1"></div>
            <div class="photo"id="photo2"></div>
            <div class="photo"id="photo3"></div>
            <div class="photo"id="photo5"></div>
        </div>
    </section>

    <section id="maintags">
        <div class="choices">
            <input type="image" name="searchstart" src="static/images/search.png" style="width: 40px; height:20px; ">
            <input type="search" placeholder="search by name" style="margin-right: 5px; width: 200px;">
            <select name="Location" id="1">
                <option value="Location" disabled selected> Location</option>
                <option value="bole">Bole</option>
                <option value="ayat">Ayat</option>
                <option value="sarbet">Sarbet</option>
                <option value="4 kilo">4 kilo</option>
            </select>
            <select name="Reason" id="2" value= "Reason">
                <option value="Restaurant"> Restaurant </option>
                <option value="Recreation">Recreation</option>
            <input type="number" id="rating" name="rating" placeholder="Rating" max="5" min="0" style="width: 80px;">
            <input type="submit" value="Arrange with tags" onclick="sort_by_tag()">
        </div>
    </section>
    <section id="mainlist">
         <div class="lists">
         <?php
                $x = 'bole';
                $y = 5;
                $z = 'restaurant';
                if (count($_POST) > 0)
                {
                    
                $x = $_POST['location'];
                $y = $_POST['rating'];
                $z =$_POST['reasoning'];
                }
                //$query = "SELECT * FROM 'store' WHERE 'type'=$z";
                $query = "SELECT * FROM `store` WHERE `location` = '".$x."' and `rating` = '".$y."' and `type` = '".$z."'";
                //$Sql = "SELECT * FROM `news` WHERE `category` = '".$Param['category']."' ORDER BY `id` DESC";
                $query_run = mysqli_query($connection,$query );?>
                <?php $count = 0;?>
                <?php while(($row = mysqli_fetch_array($query_run)) && ($count < 6) ):?>
                    <?php
                        $count ++;
                        $source = 'data:image;base64,'.base64_encode($row['image']);
                    ?>

                    <div style="background-image: url('<?php echo $source; ?>')">
                        <input type="submit" id='<?php echo $row['id']?>' value="more details" onclick="more_detail(this)">
                
                    </div>
                    <?php endwhile?>
                
            

    </div>
    </section>
    <section id="populartags">
        <b class="title">Popular</b>
        <div class="choices">
        <input type="image" name="searchstart" src="static/images/search.png" style="width: 40px; height:20px">
        <input type="search" placeholder="search by name" style="margin-right: 5px;">
        </div>
    </section>
    <section id="popularlist">
         <div class="lists">
         <?php
                $query = 'SELECT * FROM `store` WHERE rating = 5; ';
                $query_run = mysqli_query($connection,$query );
                
               
            ?>
            
         
                <?php $count = 0;?>
                <?php while(($row = mysqli_fetch_array($query_run)) && ($count < 6) ):?>
                <?php
                    $count++;
                    $source = 'data:image;base64,'.base64_encode($row['image']);
                ?>
                
                <div style="background-image: url('<?php echo $source; ?>')">
                    <input type="submit" name='<?php $row['id']?>' value="more details" onclick="more_detail(this)">
            
                </div>
                <?php endwhile?>
    </div>
    </section>
    <section id="restaurantags">
        <b  class="title">Restaruants </b>
        <div class="choices">
        <input type="image" name="searchstart" src="static/images/search.png" style="width: 40px; height:20px">
        <input type="search" placeholder="search by name" style="margin-right: 5px;">
        </div>
    </section>
    <section id="restaurantlists">
         <div class="lists">
            
            <?php
                $query = 'SELECT * FROM `store` WHERE type = "restaurant" ';
                $query_run = mysqli_query($connection,$query );
                
                $count = 0;
            ?>
            
         
                <?php $count = 0;?>
                <?php while(($row = mysqli_fetch_array($query_run)) && ($count < 6) ):?>
                <?php
                    $count++;
                    $source = 'data:image;base64,'.base64_encode($row['image']);
                    //$ID = $row['id']
                ?>
                
                <div style="background-image: url('<?php echo $source; ?>')">
                    <input type="submit"value="More detail"onclick="more_detail(this)">
            
                </div>
                <?php endwhile?>
                
           
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
