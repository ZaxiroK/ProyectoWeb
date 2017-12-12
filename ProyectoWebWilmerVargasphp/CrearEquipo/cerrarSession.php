<?php
    session_start();
    session_destroy();
    echo "<script> location.href=\"../PrincipalLogin/GrandChallengePrincipalLogin.php\" </script>";
?>