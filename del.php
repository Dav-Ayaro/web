<?php
include "conn.php";
if(isset($_GET["it"])){
$id=$_GET["it"];
$x=$conn->query("delete from post where id='$id'");
if($x==true){
    header('location:home.php');
}else{
    echo "error";
}


}









?>