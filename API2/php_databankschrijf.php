<?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamingbuddy";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        $nr = $_GET['ranknr'];
        $sql = "UPDATE gb_loldata
        SET  RankID = $nr
        WHERE AccountID=85";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    
?>