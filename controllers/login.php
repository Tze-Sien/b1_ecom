<?php 

    session_start();

    require_once './connection.php';

    $username = htmlspecialchars($_POST['username']);
    $password = sha1(htmlspecialchars($_POST['password']));

    $query = "SELECT id, username, email, isAdmin FROM users WHERE username = '$username' AND password = '$password'";
    
    $result = mysqli_fetch_assoc(mysqli_query($cn, $query));


    if($result) {
        $_SESSION['user_details'] = $result;
        header('Location: /');
    }else{
        echo "<h1>Please check your credentials</h1>";
    }

?>