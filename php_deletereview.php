<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }


    $id = $_SESSION["id"];


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    $toID = filter_input(INPUT_POST,'toID');


    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{

        //Delete review from DB
        //Prepared statement
        $stmt = $conn->prepare("DELETE 
        FROM gb_review 
        WHERE toAccountID = ? AND fromAccountID = ?");
        $stmt->bind_param("ii",$toID, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        header("Location: accountoptions.php#reviewsdiv");
        exit; 
    }
?>
