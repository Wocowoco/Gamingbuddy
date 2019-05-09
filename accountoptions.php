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
            function init(){
                <?php 

                //Get all the accountdata that is in the database
                include 'php_getaccountdetails.php';
                getAccountDetails();
                //Get all the games that belong to this account
                include 'php_getaccountgames.php';
                getAccountGames();


                //Add display names to table
                echo 'var table = document.getElementById("gamestable");';
                echo 'table.innerHTML = "<table id=\'innergamestable\'><tr><th>Spel</th><th>Accountnaam</th><th></th><th></th></tr>";';

                $itot = 0;
                //APEX games on user account
                if(isset($_SESSION['apex_amount']))
                {
                    echo 'var innertable = document.getElementById("innergamestable");';
                    for($i = 0; $i < $_SESSION['apex_amount'] + 1; $i++)
                    {
                        //Create the Apex Legends change and delete buttons, and link them to their pages
                        echo 'innertable.innerHTML += "<tr><td>Apex Legends</td><td>'. $_SESSION["apex_username"][$i] . ' </td>';
                        echo '<td><form action=php_getgamedetails.php method=POST><input type=submit value=Bewerken></input><input type=text name=game value=apex hidden></input><input type=text name=gameid value='. $_SESSION['apex_ID'][$i].' hidden></input></form></td>';
                        echo '<td><form id=delgame'.$itot.' action=php_deletegame.php method=POST><input type=button value=Verwijderen class=redErrorText onclick=\'verifyDelete(\"Apex Legends\",\"'.$_SESSION["apex_username"][$i].'\",\"'.$itot.'\");\'></input><input type=text name=game value=apex hidden></input><input type=text name=gameid value='. $_SESSION['apex_ID'][$i].' hidden></input></form></td>";';
                        $itot+= 1;
                    }

                    unset($_SESSION['apex_username']);
                    unset($_SESSION['apex_ID']);
                    unset($_SESSION['apex_amount']);
                    unset($_SESSION['gameID']);
                }

                //League of Legends games on user account
                if(isset($_SESSION['lol_amount']))
                {
                    echo 'var innertable = document.getElementById("innergamestable");';
                    for($i = 0; $i < $_SESSION['lol_amount'] + 1; $i++)
                    {
                        //Create the League of Legends change and delete buttons, and link them to their pages
                        echo 'innertable.innerHTML += "<tr><td>League of Legends</td><td>'. $_SESSION["lol_username"][$i] . ' </td>';
                        echo '<td><form action=php_getgamedetails.php method=POST><input type=submit value=Bewerken></input><input type=text name=game value=lol hidden></input><input type=text name=gameid value='. $_SESSION['lol_ID'][$i].' hidden></input></form></td>';
                        echo '<td><form id=delgame'.$itot.' action=php_deletegame.php method=POST><input type=button value=Verwijderen class=redErrorText onclick=\'verifyDelete(\"League of Legends\",\"'.$_SESSION["lol_username"][$i].'\",\"'.$itot.'\");\'></input><input type=text name=game value=lol hidden></input><input type=text name=gameid value='. $_SESSION['lol_ID'][$i].' hidden></input></form></td>";';
                        $itot+= 1;
                    }

                    unset($_SESSION['lol_username']);
                    unset($_SESSION['lol_ID']);
                    unset($_SESSION['lol_amount']);
                    unset($_SESSION['gameID']);
                }


                //If the name is already taken, throw error
                if(isset($_SESSION['namealreadytaken']))
                {
                    echo 'document.getElementById("username").value = "' . $_SESSION["namealreadytaken"] . '";';
                    echo 'document.getElementById("usernameError").innerHTML = "Deze gebruikersnaam is niet beschikbaar";';
                    echo 'document.getElementById("usernameError").removeAttribute("hidden");';
                    unset($_SESSION['namealreadytaken']);
                }


                //If the names just got updated, show message
                if(isset($_SESSION['nameschanged']))
                {
                    echo  'document.getElementById("namesUpdated").innerHTML = "Gegevens zijn aangepast.";';
                    echo 'document.getElementById("namesUpdated").removeAttribute("hidden");';
                    unset($_SESSION['nameschanged']);
                }

                //If the bio just got updated, show message
                if(isset($_SESSION['biochanged']))
                {
                    echo  'document.getElementById("bioUpdated").innerHTML = "Beschrijving is aangepast.";';
                    echo 'document.getElementById("bioUpdated").removeAttribute("hidden");';
                    unset($_SESSION['biochanged']);
                }

                //If passworderror is shown
                if(isset($_SESSION['passwordchangeerror']))
                {
                    echo 'document.getElementById("currentpasswordError").innerHTML = "Ingegeven wachtwoord is niet correct.";';
                    echo 'document.getElementById("currentpasswordError").removeAttribute("hidden");';
                    unset($_SESSION['passwordchangeerror']);
                }

                //If success on passwordchange needs to be shown
                if(isset($_SESSION['passwordchangesuccess']))
                {
                    echo 'document.getElementById("passwordUpdated").innerHTML = "Wachtwoord is aangepast.";';
                    echo 'document.getElementById("passwordUpdated").removeAttribute("hidden");';
                    unset($_SESSION['passwordchangesuccess']);
                }

                //If password on account deletion was wrong
                if(isset($_SESSION['delpassworderror']))
                {
                    echo 'document.getElementById("delpasswordError").innerHTML = "Ingegeven wachtwoord is niet correct.";';
                    echo 'document.getElementById("delpasswordError").removeAttribute("hidden");';
                    unset($_SESSION['delpassworderror']);
                }
                ?>
            }

            function verifyDelete(gamename, gameUsername, number)
            {
                //Throw confirmation message to delete account;
                if(window.confirm("Bent u zeker dat u " + gameUsername + " (" + gamename + ") wil verwijderen?"))
                {
                    document.getElementById("delgame"+number).submit();
                }
            }

            function verifyNames()
            {
                var username = document.getElementById("username").value;
                var name = document.getElementById("accname").value;
                var lastname = document.getElementById("acclastname").value;
                var error = false;

                //Check if name is filled in
                if(username.length == 0)
                {
                    error = true;
                    document.getElementById("usernameError").innerHTML = "Dit veld mag niet leeg zijn.";
                    document.getElementById("usernameError").removeAttribute("hidden");
                }
                else
                {
                    document.getElementById("accnameError").setAttribute("hidden","");
                    document.getElementById("accnameError").innerHTML = "";
                }
                //Check if name is filled in
                if(name.length == 0)
                {
                    error = true;
                    document.getElementById("accnameError").innerHTML = "Dit veld mag niet leeg zijn.";
                    document.getElementById("accnameError").removeAttribute("hidden");
                }
                else
                {
                    document.getElementById("accnameError").setAttribute("hidden","");
                    document.getElementById("accnameError").innerHTML = "";
                }

                //Check if last name is filled in
                if(lastname.length == 0)
                {
                    error = true;
                    document.getElementById("acclastnameError").innerHTML = "Dit veld mag niet leeg zijn.";
                    document.getElementById("acclastnameError").removeAttribute("hidden");
                }
                else
                {
                    document.getElementById("acclastnameError").setAttribute("hidden","");
                    document.getElementById("acclastnameError").innerHTML = "";
                }

                if(error == false)
                {
                    document.getElementById("namesform").submit();   
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
                        document.getElementById("newpassword1Error").innerHTML = "De ingegeven wachtwoorden komen niet overeen.";
                        document.getElementById("newpassword1Error").removeAttribute("hidden");
                        document.getElementById("newpassword2Error").innerHTML = "De ingegeven wachtwoorden komen niet overeen.";
                        document.getElementById("newpassword2Error").removeAttribute("hidden");
                    }
                }
                else
                {
                    document.getElementById("newpassword1Error").innerHTML = "Het ingegeven wachtwoord moet minstens 6 karakters lang zijn.";
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
                <p class="subjectheader">Beschrijving aanpassen</p>
                <div id="namediv" class="pagecenterinnerdiv">
                    <hr>
                    <form id="bioform" action="php_setaccountbio.php" method="POST">
                        <br>
                        <label class="">Beschrijving:</label><br>
                        <textarea id="bio" name="bio" class="bigtextarea"><?php if(isset($_SESSION['user_bio'])){echo $_SESSION["user_bio"]; unset($_SESSION["user_bio"]);} ?></textarea>
                        <p id="bioError" class="formError redErrorText" hidden></p>
                        

                        <hr>
                        <div class="buttoncenterdiv">
                            <input type=submit id="bioconfirm" value="Update beschrijving" class="bigbutton"><br>
                        </div>
                        <p id="bioUpdated" class="formError greenErrorText centerdiv" hidden></p>

                    </form>
                </div>
            </div>

            <div class="pagecenterdiv">
                <p class="subjectheader">Wijzig gegevens</p>
                <div id="namediv" class="pagecenterinnerdiv">
                    <hr>
                    <form id="namesform" action="php_setaccountdetails.php" method="POST">
                        <br>
                        <label class="">Accountnaam:</label><br>
                        <input type=text id="username" name="username" class="bigtextfield" value="<?php if(isset($_SESSION['user_username'])){echo $_SESSION["user_username"]; unset($_SESSION["user_username"]);} ?>">
                        <p id="usernameError" class="formError redErrorText" hidden></p>
                        <p id="usernameHint" class="formError hintText">Dit is je log-in naam. Als je deze veranderd, moet je in de toekomst die naam gebruiken voor in te loggen.</p>
                        

                        <div class="formparagraph"></div>

                        <label class="">Voornaam:</label><br>
                        <input type=text id="accname" name="accname" class="bigtextfield" value="<?php if(isset($_SESSION['user_firstname'])){echo $_SESSION["user_firstname"]; unset($_SESSION["user_firstname"]);} ?>">
                        <p id="accnameError" class="formError redErrorText" hidden></p>
                        <br>

                        <label>Achternaam:</label><br>
                        <input type=textfield id="acclastname" name="acclastname" class="bigtextfield" value="<?php if(isset($_SESSION['user_lastname'])){echo $_SESSION["user_lastname"]; unset($_SESSION["user_lastname"]);} ?>">
                        <p id="acclastnameError" class="formError redErrorText" hidden></p>
                        <br>
                        
                        <hr>
                        <div class="buttoncenterdiv">
                            <input type=button id="namesconfirm" onclick="verifyNames();" value="Update gegevens" class="bigbutton"><br>
                        </div>
                        <p id="namesUpdated" class="formError greenErrorText centerdiv" hidden></p>

                    </form>
                </div>
            </div>

            <div class="pagecenterdiv">
                <span id="passworddiv" class="spananchor"></span>
                <p class="subjectheader">Wijzig wachtwoord</p>
                <div id="passdiv" class="pagecenterinnerdiv">
                    <hr>
                    <form id="passwordform" action="php_changepassword.php" method="POST">
                        <br>
                        <label>Huidig wachtwoord:</label><br>
                        <input type="password" id="currentpassword" name="currentpassword" class="bigtextfield">
                        <p id="currentpasswordError"class="formError redErrorText" hidden></p>
                        <div class="formparagraph"></div>
                        <label>Nieuw wachtwoord:</label><br>
                        <input type="password" id="newpassword" name="newpassword" class="bigtextfield">
                        <p id="newpassword1Error"class="formError redErrorText" hidden></p>
                        <br>
                        <label>Herhaal nieuw wachtwoord:</label><br>
                        <input type="password" id="newpasswordcheck" class="bigtextfield">
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
                <span id="gamesdiv" class="spananchor"></span>
                <div id="games">
                    <p class="subjectheader">Mijn spellen</p>
                    <div id="gamesinnerdiv" class="pagecenterinnerdiv">
                        <hr>

                        <!-- DISPLAY USER'S GAME HERE -->
                        <div id="gamestable">
                        </div>
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
                <span id="accountdeldiv" class="spananchor"></span>
                <div>
                    <p class="subjectheader">Account verwijderen</p>
                    <div id="deleteaccinnerdiv" class="pagecenterinnerdiv">
                        <hr>
                        <form action="php_deleteaccount.php" method="POST">
                            <p class="redErrorText">Indien u het account wenst te verwijderen, gelieve dan uw wachtwoord in te geven en vervolgens op de "Account verwijderen" knop te klikken.</p>
                            <label>Wachtwoord:</label><br>
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
        </div>
    </body>
</html>