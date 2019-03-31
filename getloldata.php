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
        <!-- Delete all these things, just for presentation !-->
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object> 
        <div class="wvg">
             <!-- Delete all these things, just for presentation !-->
             <h1>League of Legends</h1>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "gamingbuddy";

            $id = $_SESSION["id"];
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
            WHERE loldat.AccountID = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<table><tr><th>Summoner Naam</th><th>Zone</th><th>Rank</th><th>Eerste rol</th><th>Tweede rol</th></tr>";
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["SummonerName"]. "</td><td>" . $row["Zone"]."</td><td>" . $row["rank"]."</td><td>". $row["role1"]."</td><td>". $row["role2"]."</td></tr>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
        </div> 
    </body>
</html>