<?php
include_once 'php/inc/config.php'; //import config
session_start();
if($_SESSION[id]){
    // if sigin in 
     header("location: notes.php");
}
$username=$_POST['username'];// hendle input username
$password=$_POST['password'];// hendle input password
if(isset($_POST['login'])){
 
    if(!empty($username) && !empty($password)){
        // if input not empty
        // check is correct
       $login= mysqli_query($conn,"SELECT * FROM users WHERE username ='{$username}' AND password = '{$password}'");
      // check if input is login
       if(mysqli_num_rows($login) > 0){
        // get Unique_id
while($obj = mysqli_fetch_object($login)){

    $Unique_id= $obj -> Unique_id; //hendle Unique_id
}
$_SESSION['id']=$Unique_id; // hendle Unique_id to $_SESSION['id']
echo "<meta http-equiv='refresh' content='0'>";

       }

    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/core.css">
    <title>log in </title>
</head>

<body>
    <!--container--->
    <div class="container">
        <!--sing up--->
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="sign">
            <!--title--->
            <h1>
                Log in
            </h1>
            <!--user name--->
            <input type="text" name="username" id="username" placeholder="UserName" required>
            <!--password--->
            <input type="text" name="password" id="password" placeholder="Password" required>
            <!---submit--->
            <button type="submit" name="login" id="button">login</button>
            <a href="index.php"> Don't have a account</a>
        </form>
    </div>
    <!--end container--->

</body>

</html>