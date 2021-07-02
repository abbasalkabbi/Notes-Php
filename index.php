<?php
session_start();
// check if you are sign in 
if($_SESSION[id]){
    // if sigin in 
     header("location: notes.php");
}
// if not sigin
// import db 
include_once 'php/inc/config.php';
// hendle username
$username=$_POST['username'];
// hendle password
$password=$_POST['password'];
// if click Registration 
// it is  create new  
/////////////////////////////////////////////////
if(isset($_POST['Registration'])){
   // check if empty data
    if(!empty($username) && !empty($password)){
    //if not empty data
    //check if user used before
     $user_check= mysqli_query($conn,"SELECT *FROM users WHERE username= '{$username}'");
     if(mysqli_num_rows($user_check) > 0){
         // if user name uesd before 
         echo "$username -username is already exist";
     }else{
        // if user name is new
        //hendle  Unique_id
        $Unique_id=time();
        // send data to db
        $sql =mysqli_query($conn,"INSERT INTO users (Unique_id,username,password) 
        VALUES  ('$Unique_id','$username','$password')");
    // id 
    // hendle _SESSION['id'] = Unique_id
   $_SESSION['id']=$Unique_id;
   // test SESSION['id']
  // echo $_SESSION['id'];
  echo "<meta http-equiv='refresh' content='0'>";
     }

    }

}
/////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/core.css">
    <title>create </title>
</head>

<body>
    <!--container--->
    <div class="container">
        <!--sing up--->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="sign">
            <!--title--->
            <h1>
                Create New Account
            </h1>
            <!--user name--->
            <input type="text" name="username" id="username" placeholder="UserName" required>
            <!--password--->
            <input type="text" name="password" id="password" placeholder="Password" required>
            <!---submit--->

            <button type="submit" name="Registration" id="button">Create Account </button>
            <a href="signin.php"> Have a account</a>
        </form>
    </div>
    <!--end container--->

</body>

</html>