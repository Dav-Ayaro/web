<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:verdana;
        }
        .t{
            margin: 10px;
            margin: 10px;
        }
        .one{
            background:orange;
            color:white;
            position:fixed;
            width:100%;
            padding:10px;
            height:50px;
            justify-content:space-between;
            display:inline-flex;
            
        }
        .two{
            padding-top:50px;
        }
        #prof{
            width:50px;
            height:50px;
            border-radius:50%;
            background:black;
        }
        .prof{
            width:100%;
            background:black;
            padding:10px;
            display:inline-flex;
        }
        img{
            width:100%;
            
        }
        body{
            background:black;
        }
        .tr{
            margin:0;
        }
        .tr ul{
            display:inline-flex;
            list-style:none;
        }
        .tr ul li{
            width:80px;
            text-align:center;
            margin: 10px;
            
        }
        .tr ul li a{
            text-decoration:none;
            color:black;
        }
        .l{
            background:black;
            padding:10px;
            margin:0;
        }
        #l{
            color:white;
        }
        p{
            color:white;
            padding:10px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
<div class="one">
    <div class="t">Asali tanzania</div>
    <div class="tr">
        <ul>
        
        <li><a href="search.php"><i class="fa fa-search"></i> Search</a></li>
            <li><a href="log.php"><i class="fa fa-sign-in"></i> Login</a></li>
            
        </ul>
    </div>
</div>
<div class="two">
<?php
include 'conn.php';
session_start();

$x=$conn->query("select * from post  order by muda desc");
if(mysqli_num_rows($x) > 0){
while($row=mysqli_fetch_array($x)){
$prof=$row["profile"];
$post=$row["picha"];
$desc=$row["maelezo"];
$time=$row["muda"];
$name=$row["jina"];
$id=$row["namba"];

echo"
<div class='prof'>
<a href='customer.php? id=".$id."'><img id='prof' src='profile/".$prof."'></a>
<p>".$name."<p>

</div>
<div class=''>
<img src='profile/".$post."'>

</div>
<div class='l'>
<p id='l'>".$desc."</p>
<p id='l'>".$time."</p>

</div>

";


echo "<hr>";


}



}




?>

</div>
</body>
</html>