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
        <link href="opmaak_site.css" rel="stylesheet" /> 
        <meta charset="utf-8"/>
        <title>Gamingbuddy | Account opties</title>   
        <script>
            var passwordError;
            var passwordSuccess;
            var delpasswordError;
            <?php 
            //If error is shown
            if(isset($_SESSION['passwordchangeerror']))
            {
                echo 'passwordError = "Ingegeven wachtwoord is niet correct.";';
            }

            //If success needs to be shown
            if(isset($_SESSION['passwordchangesuccess']))
            {
                echo 'passwordSuccess = "Wachtwoord is aangepast.";';
            }

            //If password on account deletion was wrong
            if(isset($_SESSION['delpassworderror']))
            {
                echo 'delpasswordError = "Ingegeven wachtwoord is niet correct.";';
            }
            unset($_SESSION['delpassworderror']);
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

                //Check if account deletion password was wrong
                if(delpasswordError != null)
                {
                    document.getElementById("delpasswordError").innerHTML = delpasswordError;
                    document.getElementById("delpasswordError").removeAttribute("hidden");              
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
                        <hr>
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
                <div id="gamesinnerdiv" class="pagecenterinnerdiv">
                    <hr>

                    <!-- DISPLAY USER'S GAME HERE -->
                    <p class="redErrorText centerdiv">Nog niet geimplementeerd</p>
                    <hr>
                    <div class="buttoncenterdiv">
                        <form action="addgame.php" method="POST">
                            <input type=submit value="Spel toevoegen" class="bigbutton"><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="pagecenterdiv">
            <div id="deleteacc">
                <p class="subjectheader">Account verwijderen</p>
                <div id="deleteaccinnerdiv" class="pagecenterinnerdiv">
                    <hr>
                    <form action="php_deleteaccount.php" method="POST">
                        <p class="redErrorText">Indien u het account wenst te verwijderen, gelieve dan uw wachtwoord in te geven en vervolgens op de "Account verwijderen" knop te klikken."</p>
                        <label>Huidig wachtwoord:</label><br>
                        <input type=password id="delpassword" name="delpassword" class="bigtextfield">
                        <p id="delpasswordError"class="formError redErrorText" hidden></p>
                        <hr>
                        <div class="buttoncenterdiv">
                            <input type=submit value="Account verwijderen" class="bigbutton"><br>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
    </body>
</html>