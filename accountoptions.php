<?php
session_start();
?>

<!DOCTYPE html>
    <html>
        <head>
        <link href="opmaak_site.css" rel="stylesheet" /> 
        <meta charset="utf-8"/>
        <title>Gamingbuddy | Account opties</title>   
        <script>
            var passwordError;
            var passwordSuccess;
            <?php 
            //If error is shown
            if(isset($_SESSION['passwordchangeerror']))
            {
                echo 'passwordError = "Huidige wachtwoord is niet correct.";';
            }

            //If success needs to be shown
            if(isset($_SESSION['passwordchangesuccess']))
            {
                echo 'passwordSuccess = "Wachtwoord is aangepast.";';
            }

            unset($_SESSION['passwordchangeerror']);
            unset($_SESSION['passwordchangesuccess']);
            ?>

            function init(){
                //Check if currentpassword is correct
                if(passwordError != null)
                {
                    document.getElementById("currentpasswordError").innerHTML = passwordError;
                    document.getElementById("currentpasswordError").removeAttribute("hidden");  
                }

                //Check if password got updated
                if(passwordSuccess != null)
                {
                    document.getElementById("passwordUpdated").innerHTML = passwordSuccess;
                    document.getElementById("passwordUpdated").removeAttribute("hidden");  
                }
            }


            function verifyPassword()
            {
                var password1 = document.getElementById("newpassword").value;
                var password2 = document.getElementById("newpasswordcheck").value;


                //Hide all errors
                document.getElementById("newpassword1Error").setAttribute("hidden","");
                document.getElementById("newpassword2Error").setAttribute("hidden","");
                document.getElementById("currentpasswordError").setAttribute("hidden","");

                //Check if the password is not empty
                if(password1.length > 5)
                {
                    //If both new passwords are the same, send it to DB to be checked against current password
                    if(password1 == password2)
                    {
                        document.getElementById("passwordform").submit();   
                    }
                    else{
                        document.getElementById("newpassword1Error").innerHTML = "De ingegeven wachtwoorden komen niet overeen."
                        document.getElementById("newpassword1Error").removeAttribute("hidden");
                        document.getElementById("newpassword2Error").innerHTML = "De ingegeven wachtwoorden komen niet overeen."
                        document.getElementById("newpassword2Error").removeAttribute("hidden");
                    }
                }
                else
                {
                    document.getElementById("newpassword1Error").innerHTML = "Het ingegeven wachtwoord moet minstens 6 karakters lang zijn."
                    document.getElementById("newpassword1Error").removeAttribute("hidden");    
                }

            }
        </script>
        </head>
    <body onload="init();">
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object> 
        <div class="wvg">
            <div class="pagecenterdiv">
                <p class="subjectheader">Wijzig wachtwoord</p>
                <div id="passdiv" class="pagecenterinnerdiv">
                    <hr>
                    <form id="passwordform" action="php_changepassword.php" method="POST">
                        <br>
                        <label>Huidig wachtwoord:</label><br>
                        <input type=password id="currentpassword" name="currentpassword" class="bigtextfield">
                        <p id="currentpasswordError"class="formError redErrorText" hidden></p>
                        <div class="formparagraph"></div>
                        <label class="formparagraph">Nieuw wachtwoord:</label><br>
                        <input type=password id="newpassword" name="newpassword" class="bigtextfield">
                        <p id="newpassword1Error"class="formError redErrorText" hidden></p>
                        <br>
                        <label>Herhaal nieuw wachtwoord:</label><br>
                        <input type=password id="newpasswordcheck" class="bigtextfield">
                        <p id="newpassword2Error"class="formError redErrorText" hidden></p>
                        <br>
                        <div class="buttoncenterdiv">
                            <input type=button id="passwordconfirm" onclick="verifyPassword();" value="Update wachtwoord" class="bigbutton"><br>
                        </div>
                        <p id="passwordUpdated" class="formError greenErrorText centerdiv" hidden></p>

                    </form>
                </div>
        </div>

        <div class="pagecenterdiv">
            <div id="games">
                <p class="subjectheader">Mijn spellen</p>
                <div id="passdiv" class="pagecenterinnerdiv">
                    <hr>

                    <!-- DISPLAY USER'S GAME HERE -->
                    <p class="redErrorText centerdiv">Word aan gewerkt</p>
                    <hr>
                    <div class="buttoncenterdiv">
                        <form action="addgame.php" method="POST">
                            <input type=submit value="Spel toevoegen" class="bigbutton"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>