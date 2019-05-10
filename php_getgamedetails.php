<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }
?>

<?php
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";
    $gameid = filter_input(INPUT_POST,'gameid');
    $game = filter_input(INPUT_POST,'game');
    
    $_SESSION["gameID"] = $gameid;
    $_SESSION["editGame"] = $game;

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
        //If game is apex
        if($_SESSION["editGame"] == "apex")
        {
            //Prepared statement
            $stmt = $conn->prepare("SELECT OriginName, PrefRole1, PrefRole2, Bio
            FROM gb_apexdata
            WHERE apexID = ?");
            $stmt->bind_param("i",$_SESSION["gameID"]);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['editApex_name'] = $row['OriginName'];
                    $_SESSION['editApex_role1'] = $row['PrefRole1'];
                    $_SESSION['editApex_role2'] = $row['PrefRole2'];
                    $_SESSION['editApex_bio'] = $row['Bio'];
                }
            }
        }

        //If game is League of Legends
        if($_SESSION["editGame"] == "lol")
        {
            //Prepared statement
            $stmt = $conn->prepare("SELECT SummonerName, RankID, PrefRole1, PrefRole2, Zone, Bio
            FROM gb_loldata
            WHERE lolID = ?");
            $stmt->bind_param("i",$_SESSION["gameID"]);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['editLol_name'] = $row['SummonerName'];
                    $_SESSION['editLol_rank'] = $row['RankID'];
                    $_SESSION['editLol_zone'] = $row['Zone'];
                    $_SESSION['editLol_role1'] = $row['PrefRole1'];
                    $_SESSION['editLol_role2'] = $row['PrefRole2'];
                    $_SESSION['editLol_bio'] = $row['Bio'];
                }
            }
        }
    }

    $conn->close();
    header("Location: editgame.php");
    exit;
?> 
