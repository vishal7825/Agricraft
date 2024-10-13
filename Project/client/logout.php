<?php
session_start();
session_destroy();

echo "<script>alert('log out successfully!!!!');</script>";
echo "<script>window.location.assign('index.php');</script>";

?>