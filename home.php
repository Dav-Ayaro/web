
<?php
include "conn.php";
session_start();
if(!isset($_SESSION["phone"])){
    header('location:log.php');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    .prof{
        padding-top: 100px;
        width: 100%;
        
    }
        #f{
            color: white;
        }
        button{
            width: 100%;
            padding: 10px;
            background-color: orange;
            color: black;
            border: 0px;
            position: fixed;
        }
        a{
            text-decoration: none;
            color: black;
        }    
        #w{
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        #p{
            padding: 5px;
            color: white;
        }
        .one{
            background-color: black;
            justify-content: space-between;
            width: 100%;
            display: inline-flex;
            position: fixed;
            height: 100px;
        }
        i{
            color: white;
        }
        img{
            width: 100%;
            
        }
        body{
            background:black;

        }
        ul{
            display: inline-flex;
            list-style: none;
        }
        li{
            width: 90px;
            padding: 10px;
            margin: 10px;
        }
        a{
            color: white;
        }
        p{
color:white;
            padding: 10px;
        }
        #a{
            padding: 10px;
            color: red;
        }
        i{
            color:white;
        }
        .post{
            padding-top: 20px;
        }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<body>
    <div class="one">
        <div class="t">
            <div class="t1">


            <?php
    
    $phone=$_SESSION["phone"];
$x=$conn->query("select * from users where namba='$phone'");
if(mysqli_num_rows($x) > 0){
$row=mysqli_fetch_array($x);
$jina=$row["jina_la_kwanza"];
$picha=$row["picha"];

echo "
<img id='w' src='profile/".$picha."'>


";




}


?>


            </div>
<div class="t1">

<?php
    
    $phone=$_SESSION["phone"];
$x=$conn->query("select * from users where namba='$phone'");
if(mysqli_num_rows($x) > 0){
$row=mysqli_fetch_array($x);
$jina=$row["jina_la_kwanza"];
$picha=$row["picha"];

echo "<p id='p'>".$jina."</p>";



}
?>
</div>        </div>



        <div class="tr">

<div class="total">


<?php

foreach($conn->query("select count(*) from post where namba='$phone'") as $row);
echo "<p id='f'>".$row['count(*)']." post </p>";
?>





</div>
<div class="menu">
    <ul>
        <li>
            <a href="post.php"><i class="fa fa-plus"> Post</i></a>
        </li>
        <li><a href="logout.php"><i class="fa fa-sign-out"> Toka</i></a></li>
    </ul>
</div>
        </div>
    </div>
    <div class="prof">
        <button><a href="prof.php">picha ya wasifu</a></button>
    </div>


    <br>
    <div class="post">


    <?php
    
    $phone=$_SESSION["phone"];
$x=$conn->query("select * from post where namba='$phone' order by muda desc");
if(mysqli_num_rows($x) > 0){
while($row=mysqli_fetch_array($x)){
$picha=$row["picha"];
$des=$row["maelezo"];
$time=$row["muda"];
$it=$row["id"];

echo"
<img  src='profile/".$picha."'>
<p>".$des."</p>
<p>".$time."</p>
<a id='a' href='del.php? it=".$it."'>Toa</a>


";
echo "<br>";
echo"<hr>";





}

}else{
    echo "<p>Hakuna post yoyote</p>";
}
?>





    </div>
</body>
</html>