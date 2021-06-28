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
                Log in
            </h1>
            <!--user name--->
            <input type="text" name="username" id="username" placeholder="UserName" required>
            <!--password--->
            <input type="text" name="password" id="password" placeholder="Password" required>
            <!---submit--->
            <input type="submit" value="Log in" name="Registration" id="button">
            <a href="index.php"> Don't have a account</a>
        </form>
    </div>
    <!--end container--->

</body>

</html>