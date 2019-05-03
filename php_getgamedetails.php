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
            $stmt = $conn->prepare("SELECT OriginName, PrefRole1, PrefRole2
            FROM gb_apexdata
            WHERE accountID = ?");
            $stmt->bind_param("i",$id);

            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $_SESSION['editApex_name'] = $row['OriginName'];
                    $_SESSION['editApex_role1'] = $row['PrefRole1'];
                    $_SESSION['editApex_role2'] = $row['PrefRole2'];
                }
            }
        }
    }

    $conn->close();
    header("Location: editgame.php");
    exit;
?> 
