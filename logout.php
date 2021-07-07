<?php
session_start();
unset($_SESSION['isloggedin']);
unset($_SESSION['username']);
session_destroy();
header('Location: index.php');