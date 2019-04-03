<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php

    if(isset($_SESSION["id"]))
    {
        $id = $_SESSION["id"];
    }
    else
    {
        $id = 0;
    }
;
    $username = filter_input(INPUT_POST,'originName');
    $prefrole1 = filter_input(INPUT_POST,'role1');
    $prefrole2 = filter_input(INPUT_POST,'role2');

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    
    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO gb_apexData (AccountID, OriginName, PrefRole1, PrefRole2)
        VALUES ('$id','$username','$prefrole1','$prefrole2')";
        if($conn->query($sql)){
            echo "New record is created succesfully";
        }
        else{
            echo "Error: ".$sql ."
            ". $conn->error;
        }
        $conn->close();

        header("Location: index.php");
        exit; 
    }
    ?>
</body>
</html>