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

    $username = filter_input(INPUT_POST,'summonerName');
    $region = filter_input(INPUT_POST,'region');

    $prefrole1 = filter_input(INPUT_POST,'role1');
    $prefrole2 = filter_input(INPUT_POST,'role2');
    $bio = filter_input(INPUT_POST,'bio');
    $rank = 0;

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
        //Edit LOL data to DB
        //Prepared statement
        $stmt = $conn->prepare("UPDATE gb_loldata 
        SET SummonerName = ?, RankID = ?, PrefRole1 = ?, PrefRole2 = ?, Zone = ?, Bio = ?
        WHERE lolID = ?");
        $stmt->bind_param("siiissi", $username,$rank,$prefrole1,$prefrole2,$region, $bio, $_SESSION["gameID"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $_SESSION["apiName"]= $username;
        $_SESSION["apiZone"] = $region;
        $_SESSION["apiID"] = $_SESSION["gameID"];
        //----------------------------
        //INCLUDE API CALL STUFF HERE
        //----------------------------
        //$_SESSION["gameID"]
















        header("Location: accountoptions.php#gamesdiv");
        exit; 
    }
    ?>
</body>
</html>