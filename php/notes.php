<?php
include_once 'config.php';
session_start();
echo $_SESSION['id'];
$notes= mysqli_query($conn,"SELECT * FROM note WHERE id_user='{$_SESSION["id"]}'");
$notes_data= mysqli_fetch_all($notes,MYSQLI_ASSOC);
  foreach($notes_data as $note){
      echo $note['title'];
      echo "run";
  }
?>