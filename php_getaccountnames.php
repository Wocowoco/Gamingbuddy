<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>

<?php
    function getAccountNames()
    {
        unset($_SESSION['accountNames']);

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamingbuddy";
        $_SESSION['accountNames'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT username FROM gb_account";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) 
        {
            // output data of each row
            $i = 0;
            while($row = $result->fetch_assoc()) {
                $accountname = $row["username"];
                $_SESSION['accountNames'][$i] = $accountname;
                $i++;
            }
        }

        $conn->close();
    }
?> 
