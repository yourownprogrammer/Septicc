<?php
@include 'config.php';

session_start();
session_unset();
session_destroy();

header('location:index.php');
?>
<!-- yeslai admin page ra user page ma rakhna parxa paxi -->