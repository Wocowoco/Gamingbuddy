<?php
session_start();
?>

<!DOCTYPE html>
    <html>
        <head>
        <link href="opmaak_site.css" rel="stylesheet" />    
        <style>
            table, th, td {
             border: 1px solid black;}
        </style>
        </head>
   
        <body>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gamingbuddy";
            $array;
            $number = 0;


            $lolSummonerName = "";
            $lolZone = "";
            $lolRank = "";
            $lolRole1 = "";
            $lolRole2 = "";
            //Reset variables
            unset($_SESSION["loldata"]);
            //Get variables 
            $name = filter_input(INPUT_POST,'name');

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 

            $sql = 
            "SELECT SummonerName, Zone, lolrank.Name AS rank, lolrole1.Name AS role1, lolrole2.Name AS role2
            FROM gb_loldata AS loldat
            INNER JOIN gb_lolrank AS lolrank ON loldat.RankID = lolrank.rankID
            INNER JOIN gb_lolRole AS lolrole1 ON loldat.PrefRole1 = lolrole1.roleID
            INNER JOIN gb_lolRole AS lolrole2 ON loldat.PrefRole2 = lolrole2.roleID
            WHERE loldat.summonerName LIKE '%$name%'";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                //Output data of each row
                
                while($row = $result->fetch_assoc())
                {
                    
                    $lolSummonerName = $row["SummonerName"];
                    $lolZone = $row["Zone"];
                    $lolRank = $row["rank"]; 
                    $lolRole1 = $row["role1"];
                    $lolRole2 = $row["role2"];

                    $loldata = array($lolSummonerName,$lolZone,$lolRank,$lolRole1,$lolRole2);
                    $_SESSION["loldata"][$number] = $loldata;
                    $number++;
                }
                
                $_SESSION['loldataAmount'] = $number;
            } else {
                //No results found
            }

            $conn->close();
            header("Location: search.php");
            exit;
            ?>
    </body>
</html>