<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>

<?php
    function getAccountDetails(){
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

        //If logged in
        if($id != null)
        {
            $sql = "SELECT Name, LastName, Username
            FROM gb_account 
            WHERE ID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_firstname'] = $row['Name'];
                    $_SESSION['user_lastname'] = $row['LastName'];
                    $_SESSION['user_username'] = $row['Username'];
                }
            }
        }

        $conn->close();
    }
?> 
