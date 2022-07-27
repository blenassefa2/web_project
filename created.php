<?php

$id =$_POST['id'] ;
$inc =$_POST['i'];



$connection = mysqli_connect('localhost','root','','places');
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
}
$query ="SELECT * FROM `store` WHERE `id` = '".$id."'";
$query_run = mysqli_query($connection,$query );

$row = mysqli_fetch_array($query_run);
$z=0;
if($inc == 'True')
{
    $z=$row['rating'] + 1;
}
else
{
    $z=$row['rating'] - 1;
}

$query = "Update store set `rating`='".$z."' where `id`='".$id."'";


$query_run = mysqli_query($connection,$query);

$message="Updated successfully!!";
if (!$query_run){
    $message ="update failed!";

}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/style.css">
    <link rel="stylesheet" href="static/nav1.css">
    <script src="static/script.js"></script>
    <script src="static/requests.js"></script>
    <link rel="icon" href="static/images/logo1.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <title>Where in addis?</title>
</head>
    <body>
    <p id="error">you have succesfully updated the rating <p>
    <input type="submit" id='<?php echo $row['id']?>' value="Click this to go back" onclick="more_detail(this)">
    </body>
</html>
