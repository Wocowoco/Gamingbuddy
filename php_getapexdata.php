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
    $stmt = $conn->prepare("SELECT OriginName, role1.Name AS legend1, role2.Name as legend2, Bio
    FROM gb_apexdata
    INNER JOIN gb_apexrole AS role1 ON role1.roleID = gb_apexdata.Prefrole1
    INNER JOIN gb_apexrole AS role2 ON role2.roleID = gb_apexdata.Prefrole2
    WHERE accountID = ?");
    $stmt->bind_param("i",$id);

    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            $apexname = $row["OriginName"];
            $apexrole1 = $row["legend1"];
            $apexrole2 = $row["legend2"];
            $apexBio = $row["Bio"];
    
            $_SESSION["ApexName"][$number] = $apexname;
            $_SESSION["ApexLegend1"][$number] = $apexrole1;
            $_SESSION["ApexLegend2"][$number] = $apexrole2;
            $_SESSION["APEXBIO"][$number] = $apexBio;

            $number++;
     }

     $_SESSION["ApexDataAmount"] = $number;
    }
    $conn->close();
}
?>