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

        //Prepared statement
        $stmt = $conn->prepare("SELECT password, id, Username FROM gb_account WHERE gb_Account.Username=?");
        $stmt->bind_param("s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                //Check if the passwords match
                if(password_verify($password,$row["password"]))
                {
                    $_SESSION["name"] = $row["Username"];
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

        $stmt->close();
        $conn->close();
        header("Location: index.php");
        exit;
    ?> 
</body>
</html>