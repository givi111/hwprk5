<?php 
    if( isset($_POST['login']) ) { //login button
        $errors = [];
        // Connect db
        $db = mysqli_connect('localhost', 'root', '', 'homework5');
        $username = mysqli_real_escape_string($db, $_POST['name']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        if($username = "") { array_push($errors, "Username is empty"); }
        if($password = "") { array_push($errors, "Password is empty"); }
        
        if( count($errors) == 0 ) {
            $password = md5($password);
            $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
            $result = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($result);
            if( $user['name'] == $username && $user['password'] == $password ) {
                $_SESSION['username'] = $username;
                header('location: index.php');
            } else {
                array_push($errors, 'Wrong username and password');
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    
    <div class="errors">
        <?php
            if( isset($errors) ) {
                if( count($errors) > 0 ) {
                    foreach($errors as $error) { ?>
                        <p> <?php echo $error ?> </p>
                <?php }
                } 
            } ?>
    </div>

    <form action="" method="POST">
        <input type="text" name="name" placeholder="name" />
        <input type="password" name="password" placeholder="password" />
        <button type="submit" name="login">login</button>
    </form>


</body>
</html>