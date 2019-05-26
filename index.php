<?php 
    session_start();
    if( isset($_SESSION['username']) ) {
        //User is logIn.
    } else {
        header("location: login.php");
    }
    if( isset($_GET['logout']) ) {
        session_destroy();
        unset($_SESSION['username']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Page</title>
</head>
<body>
    <h1> Wellcome <strong><?php echo $_SESSION['username'] ?></strong>. This is user page </h1>
    <button><a href="index.php?logout=1">LogOut</a></button>
</body>
</html>
