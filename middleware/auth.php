<?php 
    
    function check_admin() {
        if(isset($_SESSION['user_details']) && !$_SESSION['user_details']['admin']){
            header('Location: /');
        }
    }
   

?>