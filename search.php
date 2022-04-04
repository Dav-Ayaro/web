<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding:0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .one{
            padding: 10px;
            width: 100%;
            justify-content: center;
            justify-items: center;
            background-color: orange;
            position: fixed;
            height: 70px;
            
        }
        p{
            padding: 10px;
        }
        input{
            width: 70%;
            padding: 10px;
        }
        button{
            width: 20%;
            padding: 10px;
            color: white;
            background-color: black;
            border: 0;
        }
        .two{
            padding-top: 70px;
            width: 100%;
            min-height: calc(100vh - 70px);
            background-color: black;
            color: white;
        }
        img{
            width: 60px;
            height: 60px;
            border-radius: 50%;
        }
        .q{
            padding: 10px;
            display: inline-flex;
            width: 100%;
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
        <form action="" method="post">
<input type="search" name="name" id="" placeholder="Tafuta....">
<button type="submit" name="save"><i class="fa fa-search"></i></button>


        </form>
    </div>
    <div class="two">
<?php
include "conn.php";
if(isset($_POST['save'])){
$name=$_POST["name"];

$stmt=$conn->prepare("select * from post where jina = ? ");
$stmt->bind_param('s',$name);
$stmt->execute();
$res=$stmt->get_result();
if(mysqli_num_rows($res) > 0){
while($row=mysqli_fetch_array($res)){
$prof=$row["profile"];
$name=$row["jina"];
$phone=$row["namba"];
echo"

<div class='q'>
<a href='customer.php? id=".$phone."'><img src='profile/".$prof."'></a>
<p>".$name."</p>
</div>

";



}
}





}



?>
</div>
</body>
</html>