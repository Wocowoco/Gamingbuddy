<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Profielpagina</title>
        <link href="opmaak_site.css" rel="stylesheet" />
        <script src="/javascript/jquery.js"></script>

        <script>
            var loldataArray = new Array();
            var z=0;
            var changeBio = false;

            function myFunction() {
                

                var x = document.getElementById("drop").innerHTML;
                
                if (z==0)
                {
                    document.getElementById("tonen").innerHTML = x;
                    z=1;
                }
                else
                {
                    document.getElementById("tonen").innerHTML = "";
                    z=0;
                }

            }

            

            function init(){
                <?php   
                //Get profilebio from DB
                include 'php_getaccountdetails.php';
                getAccountBio();
                //aanpassen van de border van u eigen profiel zodat die overeenkomt met je rank
                include 'php_profielaanpas.php';
                getlolrank();
                getlolacounts();


                    


                
                ?>

                


            }

        </script>
        <script>
            var rank = new Array();
            var plaats = 0;
            var lengte = new Array();
            <?php
                    for($loop = 0; $loop < $_SESSION['loldataAmount']; $loop++){
                        echo "rank.push([\"" . $_SESSION['rankNr'][$loop]."\"]);";
                    }
                    echo "lengte.push([\"" . $_SESSION['loldataAmount']."\"]);";
            ?>
            $(document).ready(
                function pasblokaan(){
                    for(plaats = 0; plaats < lengte; plaats++)
                        if(rank[plaats] >= 1 && rank[plaats] <= 4 )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] >= 5 && rank[plaats] <= 8 )
                        {
                            $("#lol" + plaats).css("color", "blue", );
                        }
                        else if(rank[plaats] >= 9 && rank[plaats] <= 12 )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] >= 13 && rank[plaats] <= 16 )
                        {
                            $("#lol" + plaats).css("color", "red", );
                        }
                        else if(rank[plaats] >= 17 && rank[plaats] <= 20 )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] >= 21 && rank[plaats] <= 24 )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] == 25  )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] == 26 )
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        else if(rank[plaats] == 27)
                        {
                            $("#lol" + plaats).css("border-style", "dotted", );
                        }
                        plaats++;
                    });
        </script>
    </head>
    <body onload="init()">
        <object class="boven" name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links" id="links" name="games" type="text/html" data="games.html"> </object>
        <object class="rechts" id="rechts" name="chat" type="text/html" data="chat.html"> </object>
        <div id="test">

        </div>
        
        
        
        
        
    <div class="wvg" id="wvg">
        <div class="blokken">
            <img class="foto" src="matthias.png" alt="Wouter" onclick="pasblokaan()" >
            <h1 class="naam"><?php
                getnaam();
                $naam = $_SESSION["name"];
                echo $naam ;
            ?>
            </h1>
            <p id="userbio">
                <?php
                    //Check if there's a bio, and if it's not empty
                    if (isset($_SESSION['user_bio']))
                    {
                        if($_SESSION['user_bio'] != "")
                        {
                            echo nl2br($_SESSION['user_bio']);
                        }
                    }
                    else
                    {
                        //Show that this user has set no bio yet
                        echo "Deze gebruiker heeft nog geen bio.<br>";

                    }
                    unset($_SESSION['user_bio']);
                ?>
            </p>
        </div>


        
        <div class="blokken">
        
                <div class="titel">
                <img src="../pics/pijltje.png" alt="pijl" onclick="myFunction()" class="pijl" >
                    <ul class="top">
                        <li class="subjectheader"> League of legends </li>
                    </ul>
                    
                    
                    
                </div>
                <div id="tonen" class="tonen"></div>
                <div id="drop" class="dropdown">
                
                <?php
                $i=0;
                
                while(1){
                    if ($i == $_SESSION['loldataAmount']){
                        break;
                    }  
                        
                    else{
                        
                        echo "<div class=\"blokkenvanbinnen\" id=\"lol".$i."\"> ";
                        $k=0;

                        print_r("naam = ".$_SESSION["SummonerName"][$i]);
                        print_r($_SESSION["zone"][$i]);
                        
                        print_r($_SESSION["role1"][$i]);
                        print_r($_SESSION["role2"][$i]);
                        print_r($_SESSION["rankNaam"][$i]);
                        
                        

                        
                        $i++;
                        echo "</div>";
                    }
                    
                    
                }
                ?>
                <div  class="blokkenvanbinnen"></div>
                <div class="blokkenvanbinnen"></div>
                
                
        </div>
    </div>
    <p>
    <?php
        //------------------------------------------------------------------//
        //                                DELETE THIS                       //
        //------------------------------------------------------------------//
        echo "<b>NIET UNSETTE VARIABELEN, ZIE ONDERAAN CODE        -Wouter</b><br><br>";
        // Dit zijn variabelen die gij nergens unset na gebruik, dus doe ik het ff op het einde van uw PHP  -Wouter
        print_r($_SESSION);
        unset($_SESSION['loldata']);
        unset($_SESSION['zelfUsername']);
        unset($_SESSION['loldataAmount']);
        unset($_SESSION['lol_RankID']);
        //print_r($_SESSION);
    ?>
    </p>
    </body>
</html>