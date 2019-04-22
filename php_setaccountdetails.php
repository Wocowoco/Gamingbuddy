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

                //Update username
                $sql = "UPDATE gb_account
                SET Username = '$username'
                WHERE ID = '$id'";
                $result = $conn->query($sql);
            }
        }

        $sql = "UPDATE gb_account
        SET Name = '$name', LastName = '$lastname'
        WHERE ID = '$id'";
        $result = $conn->query($sql);
        $_SESSION['nameschanged'] = true;


        $conn->close();
        header("Location: accountoptions.php");
        exit;
    ?> 
</body>
</html>
