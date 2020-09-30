<?php 

    require_once './connection.php';
    require_once '../vendor/autoload.php';

    // Sanitize our inputs
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = sha1(htmlspecialchars($_POST['password']));
    $password2 = sha1(htmlspecialchars($_POST['password2']));
    
    $errors = 0;

    foreach ($_POST as $key => $element) {
        if(strlen($element) == 0){
            echo "Please type in something";
            $errors++;
        }
    }

    if(strlen($username) < 8 ){
        echo "Username must be greater than 8 characters";
        $errors++;
    }

    if(strlen($password) < 8 ){
        echo "Password must be greater than 8 characters";
        $errors++;
    }

    if($password != $password2){
        echo "Password do not match";
        $errors++;
    }

    if($username && $email){

        $query = "SELECT * FROM users WHERE username = '$username' AND email = '$email'";
        
        $result = mysqli_fetch_assoc(mysqli_query($cn, $query));

        if($result != NULL){
            echo "Username or email is taken";
            $errors++;
            mysqli_close($cn);
        } 
    }

    
    if($errors === 0){
        $query = "INSERT INTO users ( firstname, lastname, username, email, password ) VALUES ('$firstname', '$lastname','$username', '$email', '$password')";

        mysqli_query($cn, $query);
        mysqli_close($cn);

        // Send an Email
        // Create the Transport
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername('s1i2e3n4c5h6o7o@gmail.com')
        ->setPassword('157148285608');

        // Create the Mailer using your created Transport
        $mailer = new Swift_Mailer($transport);

        // Create a message
        $message = (new Swift_Message('B1-ECOM Registration'))
        ->setFrom(['chootzesien@gmail.com' => 'Tze Sien'])
        ->setTo([$_POST['email'] => $_POST['firstname']])
        ->setBody('Thank you for registering on B1-ECOM');

        // Send the message
        $result = $mailer->send($message);

        header('Location: /');
    }

?>