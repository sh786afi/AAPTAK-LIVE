<?php

include("functions.php");
include("views/header.php"); 

if(isset($_GET['page'])){
    if($_GET['page']=='home'){
        include("views/home.php");
    }
    else if($_GET['page']=='news'){
        include("views/news.php");
    }
    else if($_GET['page']=='single'){
        include("views/single.php");
    }
}

include("views/footer.php");

?>