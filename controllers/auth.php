<?php
    require_once 'connection.php';
    require_once '../models/user.php';
    require_once '../vendor/autoload.php';
    
    class Auth {
        public static function createUser($post){
            // Sanitize our inputs
            global $cn;

            $user = new User($post);
            $password2 = sha1(htmlspecialchars($post['password2']));
            $errors = 0;

            foreach ($user as $key => $element) {
                if(strlen($element) == 0){
                    echo "Please type in something";
                    $errors++;
                }
            }

            if(strlen($user->username) < 8 ){
                echo "Username must be greater than 8 characters";
                $errors++;
            }

            if(strlen($post['password']) < 8 ){
                echo "Password must be greater than 8 characters";
                $errors++;
            }

            if($user->password != $password2){
                echo "Password do not match";
                $errors++;
            }

            if($user->username && $user->email){

                $query = "SELECT * FROM users WHERE username = '$user->username' OR email = '$user->email'";
                
                $result = mysqli_fetch_assoc(mysqli_query($cn, $query));

                if($result != NULL){
                    echo "Username or email is taken";
                    $errors++;
                    mysqli_close($cn);
                } 
            }

            
            if($errors === 0){
                $query = "INSERT INTO users ( firstname, lastname, username, email, password ) VALUES ('$user->firstname', '$user->lastname','$user->username', '$user->email', '$user->password')";

                mysqli_query($cn, $query);
                mysqli_close($cn);
                header('Location: /');
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
                ->setTo([$post['email'] => $post['firstname']])
                ->setBody('Thank you for registering on B1-ECOM');

                // Send the message
                $result = $mailer->send($message);

                
            }
        }

        public static function login($post){

            global $cn;
            session_start();

            $username = htmlspecialchars($post['username']);
            $password = sha1(htmlspecialchars($post['password']));

            $query = "SELECT id, username, email, isAdmin FROM users WHERE username = '$username' AND password = '$password'";
            
            $result = mysqli_fetch_assoc(mysqli_query($cn, $query));


            if($result) {
                $_SESSION['user_details'] = $result;
                header('Location: /');
            }else{
                echo "<h1>Please check your credentials</h1>";
            }
        }

        public static function logout(){
            session_start();
            session_destroy();

            header('Location: /');
        }
    }