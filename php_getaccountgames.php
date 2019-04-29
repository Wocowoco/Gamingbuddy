<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>

<?php
    function getAccountGames(){
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
            //------------------
            //  APEX LEGENDS     
            //------------------
            //Prepared statement
            $stmt = $conn->prepare("SELECT OriginName, ApexID
            FROM gb_apexdata 
            WHERE accountID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                $amount = 0;
                while($row = $result->fetch_assoc()) {
                    //Get all apex entries for that account ID and store them in array
                    $_SESSION['apex_username'][$amount] = $row['OriginName'];
                    $_SESSION['apex_ID'][$amount] = $row['ApexID'];
                    $_SESSION['apex_amount'] = $amount;
                    $amount++;
                }
            }

            //----------------------
            //  LEAGUE OF LEGENDS     
            //----------------------
            //Prepared statement
            $stmt = $conn->prepare("SELECT SummonerName, LoLID
            FROM gb_loldata 
            WHERE accountID = ?");
            $stmt->bind_param("i",$id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                $amount = 0;
                while($row = $result->fetch_assoc()) {
                    //Get all lol entries for that account ID and store them in array
                    $_SESSION['lol_username'][$amount] = $row['SummonerName'];
                    $_SESSION['lol_ID'][$amount] = $row['LoLID'];
                    $_SESSION['lol_amount'] = $amount;
                    $amount++;
                }
            }
        }
        $conn->close();
    }
?> 
