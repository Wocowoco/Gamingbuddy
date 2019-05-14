<?php
    session_start();
    //If not logged in, return to mainpage
    if(!isset($_SESSION["id"]))
    {
        header("Location: index.php");
        exit;  
    }


if(isset($_SESSION["id"]))
{
    $id = $_SESSION["id"];
}
else
{
    $id = 0;
}

$type = filter_input(INPUT_POST,'editreviewtype');
$text = filter_input(INPUT_POST,'editreviewtext');
$toID = $_SESSION['otherID'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "gamingbuddy";

$conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);

if(mysqli_connect_error()){
    die('Connect Error ('.
    mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{

    //Add review to DB
    //Prepared statement
    $stmt = $conn->prepare("UPDATE gb_review
    SET type = ?, text = ?
    WHERE toAccountID = ? AND fromAccountID = ?");
    $stmt->bind_param("isii",$type,$text,$toID,$id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    header("Location: profielpagina.php#reviews");
    exit; 
}
?>
