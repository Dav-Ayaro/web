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
        section{
            justify-content: center;
            justify-items: center;
            display: flex;
        }
        .on{
            padding:10px;
                width: 350px;
                background-color: rgba(5, 5, 5, 0.6);
                border-radius: 10px;
        }    input{
                width: 100%;
                padding: 10px;
            }
            button{
                width: 100%;
                padding: 10px;  
                background-color: orange;
                border: 0;
            } #q{
                font-size: 20px;
                text-align: center;
                color: white;
            }
            .error{
                padding: 10px;
            }
            #e{
                color: red;
                width: 100%;
                padding: 10px;
                background-color: white;
        text-align:center;
            }
            #a{
                color: green;
                width: 100%;
                padding: 10px;
                background-color: white;
                text-align: center;
            }
            b{
                color:black;
            }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="one"><br><br>
    <p id="q">Jisajili sasa na asali tanzania</p>
        <br><br><br><br><br><br><br>
    <section>
        <div class="on">
            <div class="error">


<?php

include "conn.php";
if(isset($_POST["save"])){

$a=$_POST["nam1"];
$b=$_POST["nam2"];
$c=$_POST["phone"];
$d=$_POST["email"];
$e=$_POST["pass1"];
$f=$_POST["pass2"];
$hash=password_hash($e,PASSWORD_BCRYPT);
if($e != $f){
    echo "<p id='e'>Nenosiri halina ufanano!</p>";
}else{
$stmt=$conn->prepare("select * from users where namba=?");
$stmt->bind_param("s",$c);
$stmt->execute();
$res=$stmt->get_result();
if(mysqli_num_rows($res )>0){
    echo "<p id='e'>Namba ya simu <b>".$c."</b>  tayari imetumika tafadhari jaribu namba nyingine</p>";
}else{
    $stmt=$conn->prepare("insert into users(jina_la_kwanza,jina_la_mwisho,namba,email,nenosiri) values (?,?,?,?,?)");
    $stmt->bind_param("sssss",$a,$b,$c,$d,$hash);
    $stmt->execute();
    $res=$stmt->get_result();
    if($res==false){
        echo "<p id='a'>Hongera usajili wako umekamilika.</p>";
    }
}


}


    
}



?>








            </div>
            <form action="" method="post">

<input type="text" name="nam1" placeholder="Jina la kwanza" required id=""><br><br>
<input type="text" name="nam2" placeholder="Jina la Mwisho" required id=""><br><br>
<input type="tel" name="phone" id="" placeholder="Namba ya simu" required><br><br>
<input type="text" name="email" placeholder="Email"  id=""><br><br>
<input type="password" name="pass1" id="" placeholder="Neno la siri" required>
<br><br>
<input type="password" name="pass2" id="" placeholder="Thibitisha neno la siri" required><br><br>
<button type="submit" name="save">Jisajili</button>




            </form>
        </div>
    </section></div>
</body>
</html>