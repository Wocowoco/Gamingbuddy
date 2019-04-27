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

        $password = filter_input(INPUT_POST,'delpassword');

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        //If logged in
        if($id != null)
        {
            //Get user account and check password
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
                        //If the password matches
                        //Prepared statement  
                        $stmt2 = $conn->prepare("DELETE
                        FROM gb_Account
                        WHERE gb_Account.ID = ?");
                        $stmt2->bind_param("i",$id);
                        mysqli_stmt_execute($stmt2);
                        $result2 = mysqli_stmt_get_result($stmt2);          

                        //Unset session vars
                        unset($_SESSION['id']);
                        unset($_SESSION['name']);

                        //Return to title
                        $conn->close();
                        header("Location: index.php");

                        //Show that account was deleted
                        $_SESSION['accountdeleted'] = "true";
                        exit;
                    }
                    else{
                        //If the password doesn't match
                        $_SESSION['delpassworderror'] = "true";
                        //Return to the page
                        $conn->close();
                        header("Location: accountoptions.php#accountdeldiv");
                        exit;
                    }
                }
            }
        }


    ?> 
</body>
</html>