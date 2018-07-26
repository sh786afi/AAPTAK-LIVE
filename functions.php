<?php
session_start();
$link=mysqli_connect("localhost","root","","db_AAPTAK");
if(mysqli_connect_error()){
    die( "There was error in connecting to DB");
}
if(isset($_GET['function'])=="logout"){
    session_unset();    
}

?>