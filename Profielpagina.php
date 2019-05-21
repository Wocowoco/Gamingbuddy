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

            function lolfunctie() {
                
                $("#droplol").slideToggle("slow");
                

            }
            function apexfunctie() {
                

                $("#dropapex").slideToggle("slow");

            }


            function init(){
                <?php
                //As long as otherID is set, show the profile of otherID;
                if(isset($_SESSION['otherID']))  
                {
                    //Get profilebio from DB
                    include 'php_getaccountdetails.php';
                    getOtherAccountBio();
                    //aanpassen van de border van u eigen profiel zodat die overeenkomt met je rank
                    include 'php_profielaanpas.php';
                    getotherlolrank();
                    getotherlolacounts(); 
                    //apexdata ophalen
                    include 'php_getapexdata.php';
                    getapexacounts();
                }
            
                //Show your own profile
                else 
                {
                    //Get profilebio from DB
                    include 'php_getaccountdetails.php';
                    getAccountBio();
                    //aanpassen van de border van u eigen profiel zodat die overeenkomt met je rank
                    include 'php_profielaanpas.php';
                    getlolrank();
                    getlolacounts();
                    //apexdata ophalen
                    include 'php_getapexdata.php';
                    getapexacounts();
                    
                }


                                
                //Only show loldiv is there is a game
                if(!isset($_SESSION['loldataAmount']))
                {
                    echo 'document.getElementById("loldiv").setAttribute("hidden","");';
                }
                else if($_SESSION['loldataAmount'] == 0)
                {
                    echo 'document.getElementById("loldiv").setAttribute("hidden","");';
                }
                
                //Only show apexdiv if there is a game
                if(!isset($_SESSION['ApexDataAmount']))
                {
                    echo 'document.getElementById("apexdiv").setAttribute("hidden","");';
                }

                ?>

                
            }

            function changeReview(number)
            {
                var field = document.getElementById("reviewtext");
                if(number == 0)
                {
                    field.setAttribute("class","bigtextarea bad");
                }
                else
                {
                    field.setAttribute("class","bigtextarea good");
                }
            }

            function changeReviewEdit(number)
            {
                var field = document.getElementById("editreviewtext");
                if(number == 0)
                {
                    field.setAttribute("class","bigtextarea bad");
                }
                else
                {
                    field.setAttribute("class","bigtextarea good");
                }
            }

            function verifyReview()
            {
                var error = false;
                //Check if radio is checked
                if(document.getElementById('badreview').checked)
                {
                }
                else if(document.getElementById('goodreview').checked)
                {
                }
                else
                {
                    error = true;
                    document.getElementById("reviewadderror").innerHTML = "Gelieve aan te duiden of het een positieve of negative review is.";
                    document.getElementById("reviewadderror").removeAttribute("hidden");
                }

                //Check if any text is entered
                if(document.getElementById('reviewtext').value != "")
                {
                }
                else
                {
                    error = true;
                    document.getElementById("reviewadderror").innerHTML = "Gelieve de review niet leeg te laten.";
                    document.getElementById("reviewadderror").removeAttribute("hidden");
                }

                //If no error, send review
                if(error == false)
                {
                    document.getElementById('addreview').submit();
                }
            }

            function verifyReviewEdit()
            {
                var form = document.getElementById("editreview");
                form.setAttribute("action","php_editreview.php");
                form.submit();
            }

            function verifyReviewDelete()
            {
                if(window.confirm("Bent u zeker dat u de review wil verwijderen?"))
                {
                    var form = document.getElementById("editreview");
                    form.setAttribute("action","php_deletereview.php");
                    form.submit();
                }
            }

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
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("iron");
                        }
                        else if(rank[plaats] >= 5 && rank[plaats] <= 8 )
                        {
                            
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("bronze");
                        }
                        else if(rank[plaats] >= 9 && rank[plaats] <= 12 )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("silver");
                        }
                        else if(rank[plaats] >= 13 && rank[plaats] <= 16 )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("gold");
                        }
                        else if(rank[plaats] >= 17 && rank[plaats] <= 20 )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("platinum");
                        }
                        else if(rank[plaats] >= 21 && rank[plaats] <= 24 )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("diamond");
                        }
                        else if(rank[plaats] == 25  )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("master");
                        }
                        else if(rank[plaats] == 26 )
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("grandmaster");
                        }
                        else if(rank[plaats] == 27)
                        {
                            var element = document.getElementById("lol" + plaats);
                            element.classList.add("challenger");
                        }
                        plaats++;
                    });
        </script>
    </head>
    <body onload="init()">
        <object class="boven" name="menu" type="text/html" data="Menu.html"> </object>
        <div id="test">
        </div>
   
    <div class="wvg" id="wvg">
        <div class="blokken">
            <h1 class="naam"><?php
                if(isset($_SESSION['otherID']))
                {
                    getothernaam();
                    $naam = $_SESSION["zelfUsername"];
                    echo $naam;
                }
                else
                {
                    getnaam();
                    $naam = $_SESSION["zelfUsername"];
                    echo $naam;
                }
            ?>
            </h1>
            <p id="userbio" class="gebruikerbio">
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


        
        <div class="blokken" id="loldiv">
        
            <div class="titel">
            <img src="../pics/pijltje.png" alt="pijl" onclick="lolfunctie()" class="pijl" >
                <ul class="top">
                    <li class="subjectheaderlol"><img src="/pics/lollogo.png" alt="League of legends" onclick="lolfunctie()">  </li>
                </ul>                                
            </div>
            <div id="tonenlol" class="tonen"></div>
            <div id="droplol" class="dropdown"> 
                <?php
                $i=0;
                
                while(1)
                {
                    if ($i == $_SESSION['loldataAmount'])
                    {
                        break;
                    }  
                        
                    else{         
                        echo "<div class=\"blokkenvanbinnen\" id=\"lol".$i."\"> ";
                        $k=0;
                        echo "<span class=\"gameusername\">";
                        print_r("Summonernaam: ".$_SESSION["SummonerName"][$i]);
                        echo "</span>";

                        echo "<span class=\"gameinfo\">";
                        print_r("Regio: ".$_SESSION["zone"][$i]);
                        echo "</span>";
                        
                        echo "<span class=\"gameinfo\">";
                        print_r("Voorkeursrol: ".$_SESSION["role1"][$i]);
                        echo "</span>";

                        echo "<span class=\"gameinfo\">";
                        print_r("Tweede rol: ".$_SESSION["role2"][$i]);
                        echo "</span>";

                        echo "<span class=\"gameinfo\">";
                        print_r("Rank: ".$_SESSION["rankNaam"][$i]);
                        echo "</span>";
                        
                        echo "<span class=\"gameinfo\">";
                        print_r("Level: ".$_SESSION["Level"][$i]);
                        echo "</span>";


                        if($_SESSION["Bio"][$i] != "")
                        {
                            echo "<div class=\"gameinfo\">";
                            print_r("Beschrijving: ".$_SESSION["Bio"][$i] . "test");
                            echo "</div>";
                        }
                        else
                        {
                            
                        }

                        $i++;
                        echo "</div>";
                    }                   
                    
                }


                //UNSETTING PHP SESSION VARIABLES
                unset($_SESSION['SummonerName']);
                unset($_SESSION['zone']);
                unset($_SESSION['role1']);
                unset($_SESSION['role2']);
                unset($_SESSION['rankNaam']);
                unset($_SESSION['loldataAmount']);
                unset($_SESSION["Level"]);
                unset($_SESSION["Bio"]);

                ?>
                                       
            </div>
        </div>


        <div class="blokken" id="apexdiv">
            <div class="titel">
                <img src="../pics/pijltje.png" alt="pijl" onclick="apexfunctie()" class="pijl" >
                <ul class="top">
                    <li class="subjectheaderapex"> Apex Legends </li>
                </ul>                                
            </div>
            <div id="tonenapex" class="tonen"></div>
            <div id="dropapex" class="dropdown"> 
                
                <?php
                $i=0;
                while(1)
                {
                    if ($i == $_SESSION['ApexDataAmount'])
                    {
                        break;
                    }  
                        
                    else{         
                        echo "<div class=\"blokkenvanbinnen\" id=\"apex".$i."\"> ";
                        $k=0;
                        echo "<span class=\"gameusername\">";
                        print_r("Origin naam: ".$_SESSION["ApexName"][$i]);
                        echo "</span>";

                        echo "<span class=\"gameinfo\">";
                        print_r("Voorkeurs Legend: ".$_SESSION["ApexLegend1"][$i]);
                        echo "</span>";
                        
                        
                        echo "<span class=\"gameinfo\">";
                        print_r("Tweede Legend: ".$_SESSION["ApexLegend2"][$i]);
                        echo "</span>";

                        if($_SESSION["APEXBIO"][$i] != "")
                        {
                            echo "<div class=\"gameinfo\">";
                            print_r("beachrijving: ".$_SESSION["APEXBIO"][$i]);
                            echo "</div>";
                        }
                        else
                        {
                            
                        }
                        
                        $i++;
                        echo "</div>";
                    }                   
                    
                }

                //UNSETTING PHP SESSION VARIABLES
                unset($_SESSION['ApexName']);
                unset($_SESSION['ApexLegend1']);
                unset($_SESSION['ApexLegend2']);
                unset($_SESSION['ApexDataAmount']);
                ?>
                                       
            </div>
        </div>

        <?php
            include 'php_getreviews.php';
            getReviewsAboutAccount();
        ?>
        <div class="blokken"> 
            <span id="reviews" class="spananchor"></span>
            <p class="subjectheader">Reviews</p>
            <?php   
                //Display amount of good and bad review, only if there are any
                if(isset($_SESSION['reviewsAmount']))
                {
                    echo '<p class="subjectheader"><img src=../pics/positive.png alt=positive>'.(int)$_SESSION["positiveReviewPercent"].'%   <img src=../pics/negative.png alt=negatief>'. (int)(100 - $_SESSION["positiveReviewPercent"]).'%</p>';
                }
                echo '<hr>'; 
                //Check if any reviews are found
                if(isset($_SESSION['reviewsAmount']))
                {
                    //Create reviews
                    for($i = 0; $i < $_SESSION["reviewsAmount"]; $i++)
                    {
                        //Check if positive or negative review
                        if($_SESSION["reviewdata"][$i][0] == 0) //Bad review
                        {
                            echo "<div class='formborder bad'>";
                        }
                        else //Good review
                        {
                            echo "<div class='formborder good'>";
                        }

                        //Review text
                        echo "<p>";
                        echo $_SESSION["reviewdata"][$i][2] . "</p>";
                        //Review writer
                        echo "<p class=reviewauthor>";
                        echo $_SESSION["reviewdata"][$i][1]. "</p></div>";

                        //Check if review is written by yourself, of so, show edit review instead of write review
                        if($_SESSION['id'] == $_SESSION["reviewdata"][$i][3]) 
                        {
                            $_SESSION['writtenreview'] = $i;

                        }
                    }
                }
                else
                {
                    echo "Er zijn nog geen reviews geschreven over deze gebruiker.<br>";
                }
            ?>
        </div>

        <div class="pagecenterdiv" <?php if(!isset($_SESSION['otherID']) || isset($_SESSION['writtenreview'])){echo 'hidden';}?>>
            <div class= "pagecenterinnerdiv">
                <p class="subjectheader">Schrijf een review</p>
                <hr>
                <form action="php_addreview.php" id="addreview" method="post">
                    <div class="reviewtype">
                        <input onclick="changeReview(1);" type="radio" name="reviewtype" id="goodreview" value="1"> Positief
                        <input onclick="changeReview(0);" type="radio" name="reviewtype" id="badreview" value="0"> Negatief
                    </div>
                    <textarea name="reviewtext" id="reviewtext" class="bigtextarea"></textarea>
                    <p class="formError redErrorText" id="reviewadderror"></p>
                    <hr>
                    <div class="buttoncenterdiv">
                        <input class="bigbutton" type="button" value="Post review" onclick="verifyReview();">
                    </div>
                </form>
            </div>
        </div>

        <div class="pagecenterdiv" <?php if(!isset($_SESSION['otherID']) || !isset($_SESSION['writtenreview'])){echo 'hidden';}?>> 
            <span id="reviewedit" class="spananchor"></span>
            <div class= "pagecenterinnerdiv">
                <p class="subjectheader">Bewerk je review</p>
                <hr>
                <form id="editreview" method="post">
                    <div class="reviewtype">
                        <input onclick="changeReviewEdit(1);" type="radio" name="editreviewtype" id="goodreview" value="1" <?php if(isset($_SESSION['writtenreview'])){if($_SESSION['reviewdata'][$_SESSION['writtenreview']][0] == 1){echo 'checked';}}?>> Positief
                        <input onclick="changeReviewEdit(0);" type="radio" name="editreviewtype" id="badreview" value="0" <?php if(isset($_SESSION['writtenreview'])){if($_SESSION['reviewdata'][$_SESSION['writtenreview']][0] == 0){echo 'checked';}}?>> Negatief
                    </div>
                    <textarea name="editreviewtext" id="editreviewtext" class="bigtextarea"><?php if(isset($_SESSION['writtenreview'])){echo $_SESSION['reviewdata'][$_SESSION['writtenreview']][2];}?></textarea>
                    <p class="formError redErrorText" id="editreviewerror"></p>
                    <hr>
                    <div class="buttoncenterdiv">
                        <input class="bigbutton" type="button" value="Bewerk review" onclick="verifyReviewEdit();">
                        <input class="bigbutton redErrorText" type="button" value="Verwijder review" onclick="verifyReviewDelete();">
                    </div>
                </form>
            </div>
        </div>

        <?php
            //Unset variables
            unset($_SESSION['reviewsAmount']);
            unset($_SESSION['reviewdata']);

            unset($_SESSION['writtenreview']);

            unset($_SESSION['positiveReviewPercent']);
        ?>
    </div>
    <div class="buttoncenterdiv">

    <?php
        //------------------------------------------------------------------//
        //                                DELETE THIS                       //
        //------------------------------------------------------------------//
        echo "<b>NIET UNSETTE VARIABELEN, ZIE ONDERAAN CODE        -Wouter</b><br><br>";
        // Dit zijn variabelen die gij nergens unset na gebruik, dus doe ik het ff op het einde van uw PHP  -Wouter
        print_r($_SESSION);
        
    ?>
    </div>
    </body>
</html>