<?php
session_start();
$link=mysqli_connect("localhost","root","","db_AAPTAK");
if(mysqli_connect_error()){
    die( "There was error in connecting to DB");
}
if(isset($_GET['function'])=="logout"){
    session_unset();    
}
function displayNews(){
    global $link;
    $query="SELECT * From db_news ";
    $result=mysqli_query($link, $query);
    while($row=mysqli_fetch_assoc($result)){
        echo $subNews = '<div class="col-md-6">
        <div class="category_article_body">
            <div class="top_article_img">
                <img class="img-fluid" src="'?><?php echo $row['newsImage'];?> <?php echo $subNews =  '" alt="feature-top">
            </div>
            <!-- top_article_img -->

            <div class="category_article_title">
                <h5><a href="?page=single&id='?><?php echo $row['id'];?> <?php echo $subNews =  '" target="_blank">'?>
                <?php echo $row['newsTitle'];?> <?php echo $subNews =  '</a></h5>
            </div>
            <!-- category_article_title -->

            <div class="article_date">
                <a href="#">'?><?php echo date("d-m-Y", strtotime($row['newsDate'])); ?><?php echo $subNews = '</a>, by: <a href="#">'?><?php echo $row['newsEditor'];?> <?php echo $subNews =  '</a>
            </div>
            <!-- article_date -->

            <div class="category_article_content">'?>
            <?php echo $row['newsDesc']; ?>

            <?php echo $subNews = '</div>
            <!-- category_article_content -->

            <div class="article_social">
                <span><a href="#"><i class="fa fa-share-alt"></i>424 </a> Shares</span>
                <span><i class="fa fa-comments-o"></i><a href="#">4</a> Comments</span>
            </div>
            <!-- article_social -->

        </div>
        <!-- category_article_body -->

    </div>
    
    <!-- col-md-6 -->';
            
        }
        

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