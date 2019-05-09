<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php   
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";


        $bio = filter_input(INPUT_POST,'bio');

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

        //If logged in
        if($id != null)
        {
       
        //Update bio from logged in user
        //Prepared statement
        $stmt = $conn->prepare("UPDATE gb_account
        SET bio = ?
        WHERE ID = ?");
        $stmt->bind_param("si",$bio, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //Update user that names have been changed
        $_SESSION['biochanged'] = true;
        }

        $conn->close();
        header("Location: accountoptions.php");
        exit;
    ?> 
</body>
</html>
