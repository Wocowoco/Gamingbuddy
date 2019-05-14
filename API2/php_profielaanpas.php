<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>

<?php
    function getlolrank(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //ProfielID die je nu opzoekt
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
            $sql = "SELECT RankID
            FROM gb_loldata 
            WHERE accountID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {       // zorgt dat ge 1 lijn hebt
                    $_SESSION['lol_RankID'] = $row['RankID'];
                }
            }
        }

        $conn->close();
    }

    function getotherlolrank(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //ProfielID die je nu opzoekt
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
            $sql = "SELECT RankID
            FROM gb_loldata 
            WHERE accountID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {       // zorgt dat ge 1 lijn hebt
                    $_SESSION['lol_RankID'] = $row['RankID'];
                }
            }
        }

        $conn->close();
    }


    function getnaam(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //ProfielID die je nu opzoekt
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
            $sql = "SELECT Username
            FROM gb_account 
            WHERE ID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {       // zorgt dat ge 1 lijn hebt
                    $_SESSION['zelfUsername'] = $row['Username'];
                }
            }
        }

        $conn->close();
    }

    function getothernaam(){
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

        //ProfielID die je nu opzoekt
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
            $sql = "SELECT Username
            FROM gb_account 
            WHERE ID = '$id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {       // zorgt dat ge 1 lijn hebt
                    $_SESSION['zelfUsername'] = $row['Username'];
                }
            }
        }

        $conn->close();
    }

    function getlolacounts(){

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

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

        $number = 0;
        //Prepared statement
        $stmt = $conn->prepare("SELECT SummonerName, Zone, lolrank.Name AS rankName, lolrank.rankID AS rankNr, lolrole1.Name AS role1, lolrole2.Name AS role2
        FROM gb_loldata AS loldat
        INNER JOIN gb_lolrank AS lolrank ON loldat.RankID = lolrank.rankID
        INNER JOIN gb_lolRole AS lolrole1 ON loldat.PrefRole1 = lolrole1.roleID
        INNER JOIN gb_lolRole AS lolrole2 ON loldat.PrefRole2 = lolrole2.roleID
        WHERE loldat.AccountID LIKE ?");
        $stmt->bind_param("i",$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $number = 0;
        while($row = $result->fetch_assoc())
        {
                
            $lolSummonerName = $row["SummonerName"];
            $lolZone = $row["Zone"];
            $lolrankNr = $row["rankNr"];
            $lolRole1 = $row["role1"];
            $lolRole2 = $row["role2"];
            $rankname = $row["rankName"];
            
            $_SESSION["SummonerName"][$number] = $lolSummonerName;
            $_SESSION["zone"][$number] = $lolZone;
            $_SESSION["rankNr"][$number] = $lolrankNr;
            $_SESSION["role1"][$number] = $lolRole1;
            $_SESSION["role2"][$number] = $lolRole2;
            $_SESSION["rankNaam"][$number] = $rankname;

            
            $number++;

            
            }

        $_SESSION['loldataAmount'] = $number;
                

    $conn->close();
    }

    function getotherlolacounts(){

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";

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

        $number = 0;
        //Prepared statement
        $stmt = $conn->prepare("SELECT SummonerName, Zone, lolrank.Name AS rankName, lolrank.rankID AS rankNr, lolrole1.Name AS role1, lolrole2.Name AS role2
        FROM gb_loldata AS loldat
        INNER JOIN gb_lolrank AS lolrank ON loldat.RankID = lolrank.rankID
        INNER JOIN gb_lolRole AS lolrole1 ON loldat.PrefRole1 = lolrole1.roleID
        INNER JOIN gb_lolRole AS lolrole2 ON loldat.PrefRole2 = lolrole2.roleID
        WHERE loldat.AccountID LIKE ?");
        $stmt->bind_param("i",$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $number = 0;
        while($row = $result->fetch_assoc())
        {
                
            $lolSummonerName = $row["SummonerName"];
            $lolZone = $row["Zone"];
            $lolrankNr = $row["rankNr"];
            $lolRole1 = $row["role1"];
            $lolRole2 = $row["role2"];
            $rankname = $row["rankName"];
            
            $_SESSION["SummonerName"][$number] = $lolSummonerName;
            $_SESSION["zone"][$number] = $lolZone;
            $_SESSION["rankNr"][$number] = $lolrankNr;
            $_SESSION["role1"][$number] = $lolRole1;
            $_SESSION["role2"][$number] = $lolRole2;
            $_SESSION["rankNaam"][$number] = $rankname;

            
            $number++;

            
            }

        $_SESSION['loldataAmount'] = $number;
                

    $conn->close();
    }
?>
