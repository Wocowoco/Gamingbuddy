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
    $bio = filter_input(INPUT_POST,'bio');

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
        
        //Add apexdata to DB
        //Prepared statement
        $stmt = $conn->prepare("INSERT INTO gb_apexData (AccountID, OriginName, PrefRole1, PrefRole2, Bio)
        VALUES (?,?,?,?,?)");
        $stmt->bind_param("ssiis",$id,$username,$prefrole1,$prefrole2, $bio);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        header("Location: index.php");
        exit; 
    }
    ?>
</body>
</html>