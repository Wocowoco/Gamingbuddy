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


        $name = filter_input(INPUT_POST,'accname');
        $lastname = filter_input(INPUT_POST,'acclastname');
        $username = filter_input(INPUT_POST,'username');
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
            //Check if username changed
            if($username != $_SESSION['name'])
            {
                include 'php_getaccountnames.php';
                getAccountNames();
                 
                //Check if the username is not already taken
                for($i = 0; $i < sizeof($_SESSION['accountNames']) ; $i++)
                {
                    if(strtolower($username) == strtolower($_SESSION['accountNames'][$i]))
                    {
                        $conn->close();
                        header("Location: accountoptions.php");
                        $_SESSION['namealreadytaken'] = $username;
                        exit; 
                    }
                }

                //Remove names variable
                unset($_SESSION['accountNames']);

                //Update username
                //Prepared statement
                $stmt = $conn->prepare("UPDATE gb_account
                SET Username = ?
                WHERE ID = ?");
                $stmt->bind_param("si",$username, $id);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            }
        }

        //Update name & lastname
        //Prepared statement
        $stmt = $conn->prepare("UPDATE gb_account
        SET Name = ?, LastName = ?
        WHERE ID = ?");
        $stmt->bind_param("ssi",$name,$lastname, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //Update user that names have been changed
        $_SESSION['nameschanged'] = true;


        $conn->close();
        header("Location: accountoptions.php");
        exit;
    ?> 
</body>
</html>
