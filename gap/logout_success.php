<?php
header("Location: ../index.php");
session_start();
unset($_SESSION["uid"]);
unset($_SESSION["aid"]);
?>