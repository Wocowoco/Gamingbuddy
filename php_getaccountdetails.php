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
            //Prepared statement
            $stmt = $conn->prepare("SELECT Name, LastName, Username, Bio
            FROM gb_account 
            WHERE ID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_firstname'] = $row['Name'];
                    $_SESSION['user_lastname'] = $row['LastName'];
                    $_SESSION['user_username'] = $row['Username'];
                    $_SESSION['user_bio'] = $row['Bio'];
                }
            }
        }

        $conn->close();
    }

    function getOtherAccountDetails(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //Get the current logged in user's ID
        if(isset($_SESSION['otherID']))
        {
            $id = $_SESSION['otherID'];
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
            //Prepared statement
            $stmt = $conn->prepare("SELECT Name, LastName, Username, Bio
            FROM gb_account 
            WHERE ID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_firstname'] = $row['Name'];
                    $_SESSION['user_lastname'] = $row['LastName'];
                    $_SESSION['user_username'] = $row['Username'];
                    $_SESSION['user_bio'] = $row['Bio'];
                }
            }
        }

        $conn->close();
    }

    function getAccountBio(){
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
            //Prepared statement
            $stmt = $conn->prepare("SELECT Bio
            FROM gb_account 
            WHERE ID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_bio'] = $row['Bio'];
                }
            }
        }

        $conn->close();
    }

    function getOtherAccountBio(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //Get the current logged in user's ID
        if(isset($_SESSION['otherID']))
        {
            $id = $_SESSION['otherID'];
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
            //Prepared statement
            $stmt = $conn->prepare("SELECT Bio
            FROM gb_account 
            WHERE ID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['user_bio'] = $row['Bio'];
                }
            }
        }

        $conn->close();
    }
?> 
