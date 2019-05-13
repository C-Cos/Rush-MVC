<?php

session_destroy();

/* unset($_COOKIE['user_name']);
setcookie("user_name", "", time()-3600, "/");
 */

header("Location: login.php");
