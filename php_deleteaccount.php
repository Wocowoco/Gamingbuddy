<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php

        $usernameF = $username;
        $username = strtolower($username);
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //Get the current logged in user's ID
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
        }

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 


        if($id != null)
        {
            $sql = 
            "DELETE FROM gb_account 
            WHERE gb_Account.ID LIKE '$id'";
            $result = $conn->query($sql);
        }


    $conn->close();
    header("Location: index.php");
    exit;
    ?> 
</body>
</html>