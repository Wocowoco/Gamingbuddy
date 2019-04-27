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

        //Get the current logged in user's ID
        if(isset($_SESSION['id']))
        {
            $id = $_SESSION['id'];
        }

        $password = filter_input(INPUT_POST,'currentpassword');
        $newpassword = filter_input(INPUT_POST,'newpassword');

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        //If logged in
        if($id != null)
        {
            //Prepared statement
            $stmt = $conn->prepare("SELECT password
            FROM gb_account 
            WHERE ID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    if(password_verify($password,$row["password"]))
                    {
                        $newpassword = password_hash("$newpassword", PASSWORD_DEFAULT);
                        
                        //If the password matches   
                        //Prepared statement
                        $stmt2 = $conn->prepare("UPDATE gb_account 
                        SET password = ?
                        WHERE gb_Account.ID = ?");
                        $stmt2->bind_param("si",$newpassword,$id);
                        mysqli_stmt_execute($stmt2);
                        $result2 = mysqli_stmt_get_result($stmt2);

                        $_SESSION['passwordchangesuccess'] = "true";
                    }
                    else{
                        //If the password doesn't match
                        $_SESSION['passwordchangeerror'] = "true";
                    }
                }
            }
        }

    $conn->close();
    header("Location: accountoptions.php#passworddiv");
    exit;
    ?> 
</body>
</html>