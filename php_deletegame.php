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

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    $gameid = filter_input(INPUT_POST,'gameid');
    $gameToDelete = filter_input(INPUT_POST,'game');
    


    
    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{
        
        if($gameToDelete == "apex")
        {
            //Delete apexdata from DB
            //Prepared statement
            $stmt = $conn->prepare("DELETE 
            FROM gb_apexData 
            WHERE apexID = ?");
            $stmt->bind_param("i",$gameid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        }

        header("Location: accountoptions.php");
        exit; 
    }
    ?>
</body>
</html>