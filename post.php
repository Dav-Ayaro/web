<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        section{
            justify-content: center;
            justify-items: center;
            display: flex;
        }
        .one{
            width: 400px;
            padding: 10px;
            background-color: white;
        }
        input{
            width: 100%;
            padding: 10px;
        }
        button{
            width: 30%;
            padding: 10px;
            color: black;
            background-color: orange;
            border: 0;
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
    <div class="post">
    <?php
session_start();
include "conn.php";

if(isset($_POST["save"])){
$phone=$_SESSION["phone"];
$des=$_POST["des"];
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

$x=$conn->query("select * from users where namba='$phone'");
if(mysqli_num_rows($x) > 0){
    $row=mysqli_fetch_array($x);
    $pic=$row["picha"];
    $name=$row["jina_la_kwanza"];
}




        $stmt=$conn->prepare("insert into post (namba,picha,maelezo,profile,jina) values (?,?,?,?,?)");
        $stmt->bind_param("sssss",$phone,$new,$des,$pic,$name);
        $stmt->execute();
        $res=$stmt->get_result();
        if($res==false){
            header('location:home.php');
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
    </div>
    <section>
        <div class="one">
            <form action="" method="post" enctype="multipart/form-data">
<input type="file" name="file" id=""><br><br>
<input type="text" name="des" id="" placeholder="Maelezo ya ziada"><br><br>
<button type="submit" name="save">Post</button>


            </form>
        </div>
    </section>
</body>
</html>

