<?php
    include 'php_getregio.php';
    getregio();
    $zone = "";
    for ($i = 0; $i < $_SESSION['aantal'];$i++){
            $zone .= $_SESSION['regio'][$i];
    }
    
            $_SESSION['zone'] = $zone;
    
?>