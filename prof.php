<!DOCTYPE html>
<?php
include "conn.php";
session_start();

?>



<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        p{
            padding: 10px;
            text-align: left;
        }
        .tw{
            padding: 10px;
            background-color: white;
        }
        button{
            padding: 4px 15px;
            color: black;
            
background-color: orange;
            border: 0;
            border-radius: 10px;

        }
        img{
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }
        .one{
            justify-content: center;
            justify-items: center;
            display: flex;
            
            
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
    <br><br>
    <div class="one">

    <?php
    
    $phone=$_SESSION["phone"];
$x=$conn->query("select * from users where namba='$phone'");
if(mysqli_num_rows($x) > 0){
$row=mysqli_fetch_array($x);
$jina=$row["jina_la_kwanza"];
$picha=$row["picha"];

echo "
<img src='profile/".$picha."'>


";




}
?>

    </div>
<div class="one">

<?php
    
    $phone=$_SESSION["phone"];
$x=$conn->query("select * from users where namba='$phone'");
if(mysqli_num_rows($x) > 0){
$row=mysqli_fetch_array($x);
$jina=$row["jina_la_kwanza"];
$picha=$row["picha"];

echo "<p>".$jina."</p>";



}


?>


</div>


    <br><br><br>
    <div class="tw">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" id="">
            <button type="submit" name="save">Badili</button>
        </form>
    </div>
    <?php


if(isset($_POST["save"])){
$phone=$_SESSION["phone"];

$name=$_FILES['file']["name"];
$tmp=$_FILES['file']["tmp_name"];
$error=$_FILES['file']["error"];
$size=$_FILES['file']["size"];

$ext=explode('.',$name);
$aext=strtolower(end($ext));
$allow=array('png','jpeg','jpg');
if(in_array($aext,$allow)){
    if($size >1000){
        if($error===0){
            $new=uniqid('',true).".".$aext;
            $dest="profile/".$new;
            move_uploaded_file($tmp,$dest);
            $x=$conn->query("update users set picha='$new' where namba='$phone'");
            if($x==true){
                $y=$conn->query("update post set profile='$new' where namba='$phone'");
                header('location:prof.php');
            }else{
                echo "<p>Database error</p>";
            }



        }else{
            echo "<p>makosa yamejitokeza wakati wa kubadili picha ya wasifu </p>";
        }

    }else{
        echo "<p> saizi ya picha ni ndogo";
    }

}else{
    echo "<p> Aina ya picha uliyochagua haiwezi kutumwa";
}




}









?>
</body>
</html>