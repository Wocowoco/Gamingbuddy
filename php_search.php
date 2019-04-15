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
            unset($_SESSION["loldataAmount"]);

            //Get variables 
            $name = filter_input(INPUT_POST,'name');
            $game = filter_input(INPUT_POST,'game');

            //Game specific things
            //APEX LEGENDS

            //-------------------
            //LEAGUE OF LEGENDS
            //-------------------
            $searchLolRegion;
            $searchLolRoleTop = false;
            $searchLolRoleJungler = false;
            $searchLolRoleMid = false;
            $searchLolRoleBot = false;
            $searchLolRoleSupport = false;
            $searchByLolRole = false;

            if($game == "lol")
            {
                //Set region
                $searchLolRegion = filter_input(INPUT_POST,'region');  

                //Check if roles are allowed
                if(filter_input(INPUT_POST,'lolRoleTop') == true)
                {
                    $searchLolRoleTop = true;
                    $searchByLolRole = true;
                }

                if(filter_input(INPUT_POST,'lolRoleJungler') == true)
                {
                    $searchLolRoleJungler = true;
                    $searchByLolRole = true;
                }

                if(filter_input(INPUT_POST,'lolRoleMid') == true)
                {
                    $searchLolRoleMid = true;
                    $searchByLolRole = true;
                }

                if(filter_input(INPUT_POST,'lolRoleBot') == true)
                {
                    $searchLolRoleBot = true;
                    $searchByLolRole = true;
                }

                if(filter_input(INPUT_POST,'lolRoleSupport') == true)
                {
                    $searchLolRoleSupport = true;
                    $searchByLolRole = true;
                }
            }



            //-------------
            //SQL
            //-------------

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 


            //----------------------------------
            //LEAGUE OF LEGENDS SEARCH QUERRIES
            //----------------------------------

            //Search only by name
            if($game == "none")
            {
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
                }
            } 

            //Search with LOL parameters
            else if($game == "lol")
            {
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
                        //Check if there is a need to filter on zone/region
                        if($searchLolRegion != "none")
                        {
                            //Check if the zone matches the filter request, if not, skip it.
                            if ($lolZone != $searchLolRegion)
                            {
                                continue;
                            }
                        }
                       
                        $lolRank = $row["rank"]; 

                        $lolRole1 = $row["role1"];
                        $lolRole2 = $row["role2"];
                        //Check if roles need to be filtered
                        if($searchByLolRole == true)
                        {
                            $validrole = false;

                            //Check if looking for top
                            if($searchLolRoleTop == true)
                            {
                                if($lolRole1 == "Top")
                                {
                                    $validrole = true;
                                }
                                if($lolRole2 == "Top")
                                {
                                    $validrole = true;  
                                }
                            }

                            
                            //Check if looking for jungler
                            if($searchLolRoleJungler == true)
                            {
                                if($lolRole1 == "Jungler")
                                {
                                    $validrole = true;
                                }
                                if($lolRole2 == "Jungler")
                                {
                                    $validrole = true;

                                }
                            }

                            //Check if looking for mid
                            if($searchLolRoleMid == true)
                            {
                                if($lolRole1 == "Mid")
                                {
                                    $validrole = true;
                                }
                                if($lolRole2 == "Mid")
                                {
                                    $validrole = true;

                                }
                            }

                            //Check if looking for bot
                            if($searchLolRoleBot == true)
                            {
                                if($lolRole1 == "Bot")
                                {
                                    $validrole = true;
                                }
                                if($lolRole2 == "Bot")
                                {
                                    $validrole = true;

                                }
                            }

                            //Check if looking for support
                            if($searchLolRoleSupport == true)
                            {
                                if($lolRole1 == "Support")
                                {
                                    $validrole = true;
                                }
                                if($lolRole2 == "Support")
                                {
                                    $validrole = true;

                                }
                            }


                            //If the role is valid, allow it. If not, skip it.
                            if($validrole == false)
                            {
                                continue;
                            }
                        }
                        $loldata = array($lolSummonerName,$lolZone,$lolRank,$lolRole1,$lolRole2);
                        $_SESSION["loldata"][$number] = $loldata;
                        $number++;
                    }
                    
                    $_SESSION['loldataAmount'] = $number;
                }
            } 

            $conn->close();
            header("Location: search.php");
            exit;
            ?>
    </body>
</html>