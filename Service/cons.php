<?php 

$cons = new mysqli("localhost", "root", "", "workskill");
$cons->set_charset("UTF8");
//! Check connection
if ($cons -> connect_errno) {
    echo "Failed to connect to MySQL: " . $cons -> connect_error;
    exit();
}
?>