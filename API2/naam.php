<?php
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
    if(1)
    {
        $sql = "SELECT SummonerName
        FROM gb_loldata
        WHERE LoLID = '85'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {       // zorgt dat ge 1 lijn hebt
                $_SESSION['zelfUsername'] = $row['SummonerName'];
            }
        }
    }

    $conn->close();
}
?>