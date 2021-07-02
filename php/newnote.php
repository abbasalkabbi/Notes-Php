<?php 
include_once 'inc/config.php';
session_start();



$title= $_POST['title'];
$context= $_POST['context'];
if(empty($title) ){
    // if title is empty 
echo "Title is empty";
}elseif(empty($context)){
      // if context is empty 
    echo "context is empty";
}else{
    // if all input not empty
    
    $send =mysqli_query($conn,"INSERT INTO note (id_user,title,content) VALUES  ('{$_SESSION["id"]}','{$title}','{$context}') ");
    if($send){
    echo "okey";
}
    
}

?>