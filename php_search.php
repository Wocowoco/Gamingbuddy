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


            $lolSummonerName = "";
            $lolZone = "";
            $lolRank = "";
            $lolRole1 = "";
            $lolRole2 = "";

            //Get variables 
            $name = filter_input(INPUT_POST,'name');
            $game = filter_input(INPUT_POST,'game');

            //Game specific things
            //-------------------
            //APEX LEGENDS
            //-------------------
            $searchApexBangalore = false;
            $searchApexBloodhound = false;
            $searchApexCaustic = false;
            $searchApexGibraltar = false;
            $searchApexLifeline = false;
            $searchApexMirage = false;
            $searchApexOctane = false;
            $searchApexPathfinder = false;
            $searchApexWraith = false;

            $searchByApexLegend = false;

            //Check all allowed legends
            if($game == "apex")
            {
                if(filter_input(INPUT_POST,'apexBangalore') == true)
                {
                    $searchApexBangalore = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexBloodhound') == true)
                {
                    $searchApexBloodhound = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexCaustic') == true)
                {
                    $searchApexCaustic = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexGibraltar') == true)
                {
                    $searchApexGibraltar = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexLifeline') == true)
                {
                    $searchApexLifeline = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexMirage') == true)
                {
                    $searchApexMirage = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexOctane') == true)
                {
                    $searchApexOctane = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexPathfinder') == true)
                {
                    $searchApexPathfinder = true;
                    $searchByApexLegend = true;
                }

                if(filter_input(INPUT_POST,'apexWraith') == true)
                {
                    $searchApexWraith = true;
                    $searchByApexLegend = true;
                }
            }



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
            $searchByLolRank = false;
            $searchLolRank = 0;
            $searchLolRankOn;

            //Check all League of Legends
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

                //Check if rank needs to be filtered
                if(filter_input(INPUT_POST,'lolranksort') != "none")
                {
                    $searchLolRank = filter_input(INPUT_POST,'lolrankdiv');
                    $searchByLolRank = true;
                    $searchLolRankOn = filter_input(INPUT_POST,'lolranksort');
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
            //APEX LEGENDS SEARCH QUERRIES
            //----------------------------------    
            //Search only by name
            if($game == "none")
            {
                $number = 0;
                $sql = 
                "SELECT originName, apexrole1.Name AS role1, apexrole2.Name AS role2
                FROM gb_apexdata AS apexdat
                INNER JOIN gb_apexrole AS apexrole1 ON apexdat.PrefRole1 = apexrole1.roleID
                INNER JOIN gb_apexrole AS apexrole2 ON apexdat.PrefRole2 = apexrole2.roleID
                WHERE originName LIKE '%$name%'";
                

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //Output data of each row    
                    while($row = $result->fetch_assoc())
                    {
                        
                        $apexName = $row["originName"];
                        $apexRole1 = $row["role1"];
                        $apexRole2 = $row["role2"]; 


                        $apexdata = array($apexName,$apexRole1,$apexRole2);
                        $_SESSION["apexdata"][$number] = $apexdata;
                        $number++;
                    }
                    
                    $_SESSION['apexdataAmount'] = $number;
                }
                else
                {
                    $_SESSION['apexFAILED'] = "Failed"; 
                }
            } 

            //Search with Apex parameters
            if($game == "apex")
            {
                $number = 0;
                $sql = 
                "SELECT originName, apexrole1.Name AS role1, apexrole2.Name AS role2
                FROM gb_apexdata AS apexdat
                INNER JOIN gb_apexrole AS apexrole1 ON apexdat.PrefRole1 = apexrole1.roleID
                INNER JOIN gb_apexrole AS apexrole2 ON apexdat.PrefRole2 = apexrole2.roleID
                WHERE originName LIKE '%$name%'";
                

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    //Output data of each row    
                    while($row = $result->fetch_assoc())
                    {
                        
                        $apexName = $row["originName"];
                        $apexRole1 = $row["role1"];
                        $apexRole2 = $row["role2"]; 

                        if($searchByApexLegend == true)
                        {
                            $validrole = false;

                            //Check if looking for Bangalore
                            if($searchApexBangalore == true)
                            {
                                if($apexRole1 == "Bangalore")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Bangalore")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Bloodhound
                            if($searchApexBloodhound == true)
                            {
                                if($apexRole1 == "Bloodhound")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Bloodhound")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Caustic
                            if($searchApexCaustic == true)
                            {
                                if($apexRole1 == "Caustic")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Caustic")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Gibraltar
                            if($searchApexGibraltar == true)
                            {
                                if($apexRole1 == "Gibraltar")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Gibraltar")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Lifeline
                            if($searchApexLifeline == true)
                            {
                                if($apexRole1 == "Lifeline")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Lifeline")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Mirage
                            if($searchApexMirage == true)
                            {
                                if($apexRole1 == "Mirage")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Mirage")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Octane
                            if($searchApexOctane == true)
                            {
                                if($apexRole1 == "Octane")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Octane")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Pathfinder
                            if($searchApexPathfinder == true)
                            {
                                if($apexRole1 == "Pathfinder")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Pathfinder")
                                {
                                    $validrole = true;  
                                }
                            }

                            //Check if looking for Wraith
                            if($searchApexWraith == true)
                            {
                                if($apexRole1 == "Wraith")
                                {
                                    $validrole = true;
                                }
                                if($apexRole2 == "Wraith")
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


                        $apexdata = array($apexName,$apexRole1,$apexRole2);
                        $_SESSION["apexdata"][$number] = $apexdata;
                        $number++;
                    }
                    
                    $_SESSION['apexdataAmount'] = $number;
                }
            } 

            //----------------------------------
            //LEAGUE OF LEGENDS SEARCH QUERRIES
            //----------------------------------

            //Search only by name
            if($game == "none")
            {
                $number = 0;
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
                $number = 0;
                $sql = 
                "SELECT SummonerName, Zone, lolrank.Name AS rankName, lolrank.rankID AS rankNr, lolrole1.Name AS role1, lolrole2.Name AS role2
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


                        $lolrankName = $row["rankName"];
                        $lolrankNr = $row["rankNr"];
                        //Check if rank needs to be filtered
                        if($searchByLolRank == true)
                        {
                            //If filtered by equal
                            if($searchLolRankOn == "equals")
                            {
                                if($lolrankNr != $searchLolRank)
                                {
                                    continue;
                                }
                            }

                            //If filtered by lower
                            else if($searchLolRankOn == "lower")
                            {
                                if($lolrankNr > $searchLolRank)
                                {
                                    continue;
                                }
                            }

                            //If filtered by higher
                            else if($searchLolRankOn == "higher")
                            {
                                if($lolrankNr < $searchLolRank)
                                {
                                    continue;
                                }
                            }

                        }

                        $loldata = array($lolSummonerName,$lolZone,$lolrankName,$lolRole1,$lolRole2);
                        $_SESSION["loldata"][$number] = $loldata;
                        $number++;


                    }
                    
                    $_SESSION['loldataAmount'] = $number;
                }
            } 


            $_SESSION['searchresultsfailed'] = true; 
            //Check if any results were found
            if(isset($_SESSION['apexdata']))
            {
                $_SESSION['searchresultsfound'] = true;
            }
            else if(isset($_SESSION['loldata']))
            {
                $_SESSION['searchresultsfound'] = true;
            }         
            else
            {
                //Failed to find any results
                
            }
            $conn->close();
            header("Location: search.php");
            exit;
            ?>
    </body>
</html>