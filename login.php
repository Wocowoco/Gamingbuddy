<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php
        unset($_SESSION['Error']);
        unset($_SESSION['Welcome']);
        $username = filter_input(INPUT_POST,'username');
        $usernameF = $username;
        $username = strtolower($username);
        $password = filter_input(INPUT_POST,'password');
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";
        $error = "Gebruikersnaam of wachtwoord is niet correct.";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT password, id FROM gb_account WHERE gb_Account.Username LIKE '$username'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if(password_verify($password,$row["password"])){
                    $_SESSION["Welcome"] = "Welkom ".$usernameF;
                    $_SESSION["name"] = $username;
                    $_SESSION["id"] = $row["id"];
                }
                else{
                    $_SESSION["Error"] = $error;
                }
            }
        } 
        else {
            $_SESSION["Error"] = $error;
        }


    $conn->close();
    header("Location: index.php");
    exit;
    ?> 
</body>
</html>