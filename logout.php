<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
    </head>
<body>
    <?php
    if(isset($_SESSION['id']))
    {
        unset($_SESSION['id']);
    }

    if(isset($_SESSION['name']))
    {
        unset($_SESSION['name']);
    }
    header("Location: index.php");
    exit;
    ?> 
</body>
</html>