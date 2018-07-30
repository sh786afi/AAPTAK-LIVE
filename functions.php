<?php
session_start();
$link=mysqli_connect("localhost","root","","db_AAPTAK");
if(mysqli_connect_error()){
    die( "There was error in connecting to DB");
}
if(isset($_GET['function'])=="logout"){
    session_unset();    
}
function displayNewsTitle(){
    global $link;
    $query="SELECT newsTitle From db_news LIMIT 1 ";
    $result=mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    echo $row['newsTitle'];
    
}
function displayNewsDesc(){
    global $link;
    $query="SELECT newsDesc From db_news LIMIT 1 ";
    $result=mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    echo $row['newsDesc'];
    
}
function displayNewsContent(){
    global $link;
    $query="SELECT newsContent From db_news LIMIT 1 ";
    $result=mysqli_query($link, $query);
    $row=mysqli_fetch_assoc($result);
    echo $row['newsContent'];
    
}
?>