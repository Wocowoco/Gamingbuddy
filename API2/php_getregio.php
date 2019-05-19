<?php
    //If no session is active, start one
    if(!session_status())
    {
        session_start();
    }
?>


<?php
    function getregio(){
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
            $aantal = 0;
            $sql = "SELECT Zone
            FROM gb_loldata 
            WHERE LoLID = '85'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['regio'] = $row['Zone'];
                   }
                    $_SESSION['aantal'] = strlen($_SESSION['regio']);
            }
        }

        $conn->close();

    
    }
?> 
