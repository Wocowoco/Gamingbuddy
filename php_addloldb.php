<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }

    if(isset($_SESSION["id"]))
    {
        $id = $_SESSION["id"];
    }
    else
    {
        $id = 0;
    }

    $username = filter_input(INPUT_POST,'summonerName');
    $region = filter_input(INPUT_POST,'region');;
    $prefrole1 = filter_input(INPUT_POST,'role1');
    $prefrole2 = filter_input(INPUT_POST,'role2');
    $bio = filter_input(INPUT_POST,'bio');
    $rank = 0;

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "gamingbuddy";

    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

    if(mysqli_connect_error()){
        die('Connect Error ('.
        mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
    else{
        //Add LOL data to DB
        //Prepared statement
        $stmt = $conn->prepare("INSERT INTO gb_loldata (accountID, SummonerName, RankID, PrefRole1, PrefRole2, Zone, Bio)
        VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("isiiiss",$id,$username,$rank,$prefrole1,$prefrole2,$region, $bio);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        //----------------------------
        //INCLUDE API CALL STUFF HERE
        //----------------------------








        header("Location: accountoptions.php#gamesdiv");
        exit; 
    }
    ?>
</body>
</html>