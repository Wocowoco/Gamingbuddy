<?php
session_start();
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
        $id = 4;
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
    echo "ID:".$id."<br>";
    echo "REGION:".$region."<br>";
    echo "RANK:".$rank."<br>";
    echo "DIV:".$division."<br>";
    echo "USERNAME:".$username."<br>";
    echo "PREF1:".$prefrole1."<br>";
    echo "PREF2:".$prefrole2."<br>";
    echo "<br>";
    print_r(INPUT_POST);
    
    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{
        $sql = "INSERT INTO gb_loldata (accountID, SummonerName, RankID, PrefRole1, PrefRole2, Zone)
        VALUES ('$id','$username','$rank','$prefrole1','$prefrole2','$region')";
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