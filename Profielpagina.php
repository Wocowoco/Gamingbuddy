<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Profielpagina</title>
        <link href="opmaak_site.css" rel="stylesheet" />

        <script>
            var loldataArray = new Array();
            var z=0;

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
                //aanpassen van de border van u eigen profiel zodat die overeenkomt met je rank
                include 'profielaanpas.php';
                getlolrank();
                getlolacounts();
                    for($waar=0; $waar < $_SESSION['loldataAmount']; $waar++){
                        $rank = $_SESSION["lol_RankID"];
                        if($rank >= 1 && $rank <= 4 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"red\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank >= 5 && $rank <= 8 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"blue\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank >= 9 && $rank <= 12 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"green\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank >= 13 && $rank <= 16 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"orange\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank >= 17 && $rank <= 20 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"yellow\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank >= 21 && $rank <= 24 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"brown\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank == 25  )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"pink\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        elseif($rank == 26 )
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"purple\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                        else
                        {
                            echo "document.getElementById(\"lol".$waar."\").style.color = \"gray\";" ;
                            unset($_SESSION["user_firstname"]);
                        }
                    }

                    
                    //Set amount of data
                    if(isset($_SESSION["loldataAmount"]))
                    {
                         echo "amountOfLoldata = " . $_SESSION['loldataAmount'] . ";";


                        //Loop through all the lol data
                        for($i = 0; $i < $_SESSION['loldataAmount']; $i++)
                        {
                            echo "loldataArray.push([\"" . $_SESSION['loldata'][$i][0] . "\",\"" 
                            . $_SESSION['loldata'][$i][1] . "\",\"" 
                            . $_SESSION['loldata'][$i][2] . "\",\"" 
                            . $_SESSION['loldata'][$i][3] . "\",\"" 
                            . $_SESSION['loldata'][$i][4] . "\"]);";
                        }
                    }
                    else
                    {
                        echo "amountOfLoldata = 0;";
                    }
                ?>
            }

        </script>
    </head>
    <body onload="init()">
        <object class="boven" name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links" id="links" name="games" type="text/html" data="games.html"> </object>
        <object class="rechts" id="rechts" name="chat" type="text/html" data="chat.html"> </object>4
        <div id="test">

        </div>
        
        
        
        
        
    <div class="wvg" id="wvg">
        <div class="blokken">
            <img class="foto" src="matthias.png" alt="Wouter" >
            <h1 class="naam"><?php
                getnaam();
                $naam = $_SESSION["zelfUsername"];
                echo $naam ;
            ?>
            </h1>
            <p id="userbio">Deze gebruiker heeft nog geen bio.</p>
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
                        echo "<div class=\"blokkenvanbinnen\" id=\"lol".$i."\">";
                        $k=0;
                        for($k; $k < 5; $k++){
                            print_r($_SESSION['loldata'][$i][$k]. "  ") ;
                        }
                        $i++;
                        echo "</div>";
                    }
                    
                    
                }
                ?>
                <div  class="blokkenvanbinnen"><p>voorstel</p></div>
                <div class="blokkenvanbinnen"></div>
                
                
        </div>
    </div>

    </body>
</html>