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
    #q{
        width: 100%;
    }
    p{
        padding: 10px;
        color: white;
        background-color: black;

    }
    body{
        background-color: black;
    }
</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="re">


</div>



    <?php
    include "conn.php";
    if(isset($_GET["id"])){
$id=$_GET["id"];


$y=$conn->query("SELECT * from post where namba ='$id' order by muda desc");
if(mysqli_num_rows($y) > 0){
    while($row=mysqli_fetch_array($y)){
$picha=$row["picha"];
$time=$row["muda"];
$desc=$row["maelezo"];
echo"
<div class='q'>
<img id='q' src='profile/".$picha."'>

</div>
<div class='r'>
<p>".$desc."</p>
<p>".$time."</p>
</div>
<hr>
";




    }
}
    }
?>
</body>
</html>