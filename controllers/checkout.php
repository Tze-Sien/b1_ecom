<?php 

    session_start();

    require 'connection.php';

    class Checkout {
        public static function checkoutCast(){

            global $cn;

            if(isset($_SESSION['cart'])){
                $user_id = $_SESSION['user_details']['id'];
                $total = 0;
                $order_query = "INSERT INTO orders(user_id) VALUES ($user_id)";
                
                mysqli_query($cn, $order_query); 
                $order_id = mysqli_insert_id($cn);
        
                foreach($_SESSION['cart'] as $id => $quantity){
                    $item_query = "SELECT * FROM items WHERE id = $id";
                    $item = mysqli_fetch_assoc(mysqli_query($cn, $item_query));
                    $total = ($item['price'] * $quantity);
        
                    $item_order_query = "INSERT INTO item_order (item_id,order_id, quantity) VALUES ($id,$order_id,$quantity)";
                    mysqli_query($cn, $item_order_query);
                }
        
                $update_order = "UPDATE orders SET `total` = '$total', `isPaypal` = '0' WHERE id = $order_id";
        
                var_dump(mysqli_query($cn, $update_order));
                
                unset($_SESSION['cart']);
                header('Location: /');
        
            }
        }   

        public static function paypal(){

            global $cn;

            if(isset($_SESSION['cart'])){
                $user_id = $_SESSION['user_details']['id'];
                $total = 0;
                $order_query = "INSERT INTO orders(user_id) VALUES ($user_id)";
                
                mysqli_query($cn, $order_query); 
                $order_id = mysqli_insert_id($cn);
        
                foreach($_SESSION['cart'] as $id => $quantity){
                    $item_query = "SELECT * FROM items WHERE id = $id";
                    $item = mysqli_fetch_assoc(mysqli_query($cn, $item_query));
                    $total = ($item['price'] * $quantity);
        
                    $item_order_query = "INSERT INTO item_order (item_id,order_id, quantity) VALUES ($id,$order_id,$quantity)";
                    mysqli_query($cn, $item_order_query);
                }
        
                $update_order = "UPDATE orders SET `total` = '$total', `isPaypal` = '1' WHERE id = $order_id";
        
                var_dump(mysqli_query($cn, $update_order));
                
                unset($_SESSION['cart']);
                header('Location: /');
        
            }
        }
    }

?>