<?php
include("functions.php");
if($_GET['action']=="loginSignUp"){
    $error="";
    if($_POST['email']==""){
        $error="An Email Address Is Required";
    }
    else if($_POST['password']==""){
        $error="Password Is Required";
    }
    else if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
        $error="Please Enter Valid Email Address";

    }
    if($error!=""){
        echo $error;
        exit();
    }
    if($_POST['LoginActive']=="0"){
        $query="SELECT * FROM db_userMaster WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."' LIMIT 1";
        $result=mysqli_query($link,$query);
        if(mysqli_num_rows($result)>0) $error="The email address is already taken";
        else{
          $query="INSERT INTO `db_userMaster`(`email`, `password`) VALUES('".mysqli_real_escape_string($link,$_POST['email'])."',
            '".mysqli_real_escape_string($link,$_POST['password'])."')";
            if(mysqli_query($link, $query)){
                $_SESSION['id']=mysqli_insert_id($link);  
                
                $query="UPDATE db_userMaster SET password='".md5(md5($_SESSION['id']).$_POST['password'])."' where id=".$_SESSION['id']." LIMIT 1";
                mysqli_query($link, $query);    
                echo 1;
               
            }
            else{
                $error= "Couldn't Create User- Please Try Again";    
            }

            
        }   
    }
    else{
        $query="SELECT * FROM db_userMaster WHERE email='".mysqli_real_escape_string($link,$_POST['email'])."'LIMIT 1";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_assoc($result);
            if($row['password']==md5(md5($row['id']).$_POST['password'])){
                echo 1;
                $_SESSION['id']=$row['id'];
            }
            else{
                $error="Couldn't Find Username/Password Combination.Please Try Again";
            }
        

    }
    if($error!=""){
        echo $error;
        exit(); 
    }
}

    
?>