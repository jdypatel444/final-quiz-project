<?php
    //start the session
    session_start();

    if(isset($_SESSION["loginid"]) && $_SESSION["loginid"] === true){
        header("location: index.php");
        exit;
    }
?>