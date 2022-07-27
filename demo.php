<?php
$connection = mysqli_connect('localhost','root','','places');
$query = 'SELECT * from `store` WHERE rating = "4" ';
$query_run = mysqli_query($connection,$query );
while($row = mysqli_fetch_array($query_run)){
    echo '<img src="data:image;base64,'.base64_encode($row['image']).'" alt = "image" >';
}
?>