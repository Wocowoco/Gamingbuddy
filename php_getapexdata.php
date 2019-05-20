<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>


<?php
    function getapexacounts(){

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
    $sql = "SELECT OriginName, PrefRole1, PrefRole2
    FROM gb_apexdata
    /*INNER JOIN gb_apexrole AS rol1 ON gb_apexdata.PrefRole1 = rol1.Name
    INNER JOIN gb_apexrole AS rol2 ON gb_apexdata.Prefrole2= rol2.Name*/
    WHERE gb_apexdata.ApexID LIKE $id";
    
    $result = $conn->query($sql);

    $number = 0;
    while($row = $result->fetch_assoc())
    {
            
        $apexSummonerName = $row["OriginName"];
        $apexrole1 = $row["PrefRole1"];
        $apexrole2 = $row["PrefRole2"];

        $_SESSION["apexnaam"][$number] = $apexSummonerName;
        $_SESSION["apexrol1"][$number] = $apexrole1;
        $_SESSION["apexrol2"][$number] = $apexrole2;
        
        $number++;

        
    }

    $_SESSION['apexDataAmount'] = $number;
            

    $conn->close();
    }






    function getapexotheracounts(){

        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "gamingbuddy";
    
        if(isset($_SESSION['otherid']))
        {
            $id = $_SESSION['otherid'];
        }
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
    
        $number = 0;
        //Prepared statement
        $stmt = $conn->prepare("SELECT OriginName, PrefRole1, PrefRole2
        FROM gb_apexdata
        INNER JOIN gb_apexrole AS rol1 ON gb_apexdata.PrefRole1 = role1.Name
        INNER JOIN gb_apexrole AS rol2 ON gb_apexdata.Prefrole2= role2.Name
        WHERE loldat.AccountID LIKE ?");
        $stmt->bind_param("i",$id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        $number = 0;
        while($row = $result->fetch_assoc())
        {
                
            $apexSummonerName = $row["OriginName"];
            $apexrole1 = $row["Prefrole1"];
            $apexrole2 = $row["Prefrole2"];
    
            $_SESSION["apexnaam"][$number] = $apexSummonerName;
            $_SESSION["apexrol1"][$number] = $apexrole1;
            $_SESSION["apexrol2"][$number] = $apexrole2;
            
            $number++;
    
            
            }
    
        $_SESSION['loldataAmount'] = $number;
                
    
        $conn->close();
        }
?>