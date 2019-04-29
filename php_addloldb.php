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
    $username = filter_input(INPUT_POST,'summonerName');
    $region = filter_input(INPUT_POST,'region');
    $rank = filter_input(INPUT_POST,'rank');
    $division = filter_input(INPUT_POST,'division');
    $rank += $division;
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
        //Add LOL data to DB
        //Prepared statement
        $stmt = $conn->prepare("INSERT INTO gb_loldata (accountID, SummonerName, RankID, PrefRole1, PrefRole2, Zone)
        VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("isiiis",$id,$username,$rank,$prefrole1,$prefrole2,$region);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        header("Location: index.php");
        exit; 
    }
    ?>
</body>
</html>