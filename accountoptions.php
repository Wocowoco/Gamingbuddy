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
            function verifyPassword()
            {
                var password1 = document.getElementById("newpassword").value;
                var password2 = document.getElementById("newpasswordcheck").value;

                if(password1 == password2){

                }
            }
        </script>
        </head>
    <body>
        <object class="boven"  name="menu" type="text/html" data="Menu.html"> </object>
        <object class= "links"  name="games" type="text/html" data="games.html"> </object>
        <object class="rechts"  name="chat" type="text/html" data="chat.html"> </object> 
        <div class="wvg">
            <div class="pagecenterdiv">
                <div>
                    <p class="subjectheader">Wijzig wachtwoord</p>
                    <hr>
                    <div id="passdiv" class="pagecenterinnerdiv">
                        <form>
                            <br>
                            <label>Huidig wachtwoord:</label><br>
                            <input type=password id="currentpassword" class="bigtextfield">
                            <p id="currentpasswordError"class="formError redErrorText">Not yet implemented</p>
                            <br>
                            <label>Nieuw wachtwoord:</label><br>
                            <input type=password id="newpassword" class="bigtextfield">
                            <p id="currentpasswordError"class="formError redErrorText">Not yet implemented</p>
                            <br>
                            <label>Herhaal nieuw wachtwoord:</label><br>
                            <input type=password id="newpasswordcheck" class="bigtextfield">
                            <p id="currentpasswordError"class="formError redErrorText">Not yet implemented</p>
                            <br>
                            <div class="buttoncenterdiv">
                                <input type=button id="passwordconfirm" action="verifyPassword();" value="Update wachtwoord" class="bigbutton"><br>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> 
    </body>
</html>