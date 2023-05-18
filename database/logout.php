<?php
    session_start();

    //remove session variables
    session_unset();

    //destroy
    session_destroy();

    header('location: ../login.php');
    

?>