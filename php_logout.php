<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php

    //Unset all session variables
    unset($S_SESSION);
    
    //Destroy session
    session_destroy();

    header("Location: index.php");
    exit;
    ?> 
</body>
</html>