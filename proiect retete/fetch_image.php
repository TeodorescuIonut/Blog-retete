<?php

header("content-type:image/jpeg");

$host = 'localhost';
$user = 'root';
$pass = ' ';

mysql_connect($host, $user, $pass);

mysql_select_db('retete_db');

$name=$_GET['name'];

$select_image="select * from retete where imagename='$name'";

$var=mysqli_query($select_image);

if($row=mysqli_fetch_array($var))
{
 $image_name=$row["imagename"];
 $image_content=$row["imagecontent"];
}
echo $image;

?>