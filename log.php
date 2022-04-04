<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        .one{
            width:100%;
            min-height:100vh;
            background-image:url(./images/k.jpg);
            background-position:center;
            background-repeat:no-repeat;
            background-size:cover;
            
        

        }
        .cont{
            display: inline-flex;
            justify-content: center;
            justify-items: center;
            width: 100%;
            
        }
        #w{
            margin: 6px;
            font-size: 13px;
        }
        section{
            justify-content: center;
            justify-items: center;
            display: flex; }
            .t{
                padding:10px;
                width: 350px;
                background-color: rgba(5, 5, 5, 0.5);
                border-radius: 10px;
            }
            input{
                width: 100%;
                padding: 10px;
            }
            button{
                width: 100%;
                padding: 10px;
                background-color: orange;
                color: white;
                border: 0;
            }
            p{
                text-align: center;
                color: white;
            }
            a{
                color: red;
            }
            #q{
                font-size: 20px;
            }
            #a{
padding: 10px;
text-align: center;
width: 100%;
color: red;
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
 

<br>
<p id="q">Asali Tanzania</p>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<section>
    <div class="t">
    <div class="er">
            <?php
include "conn.php";
session_start();
if(isset($_POST["save"])){


$a=$_POST["phone"];
$b=$_POST["pass"];


$stmt=$conn->prepare("select * from users where namba=?");
$stmt->bind_param("s",$a);
$stmt->execute();
$res=$stmt->get_result();

if(mysqli_num_rows($res) > 0){
$row=mysqli_fetch_array($res);
$pass=$row["nenosiri"];
if(password_verify($b,$pass)){
header('location:home.php');
$_SESSION["phone"]=$a;
}else{
echo "<p id='a'>Neno siri siyo sahihi</p>";
}

}else{
    echo "<p id='a'> Namba ya simu siyo sahihi</p>";
}





}




            ?>
        </div>
        <form action="" method="post">
            
<input type="tel" name="phone" placeholder="Namba ya simu" id="" required><br><br>
<input type="password" name="pass" placeholder="Neno la siri" required id=""><br><br>
<button type="submit" name="save">Ingia</button>

        </form>
        <br>
        <div class="z">
            <p>Hauna akaunti. <a href="./reg.php">Fungua</a> </p>
        </div>
    </div>
</section>



<br><br><br><br><br><br><br><br><br><br><br><br>
<div class="cont">
    <p id="w"><i class="fa fa-phone"></i> +255 768 583 328</p>
    <p id="w"><i class="fa fa-envelope"></i> asalitanzania@gmail.com</p>
</div>

    </div>

</body>
</html>