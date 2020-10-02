<?php
    require_once 'connection.php';
    require_once '../vendor/autoload.php';
    
    class Cart {
        public static function addToCart($post){
            session_start();
            $id = $post['id'];
            $quantity = $post['quantity'];

            if(!isset($_SESSION['cart'])) {
                $_SESSION['cart'][$id] = $quantity;
            }else{
                $_SESSION['cart'][$id] += $quantity;
            }
        }
        
        public static function deleteCart($get){
            session_start();

            $id = $get['id'];

            unset($_SESSION['cart'][$id]);

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }

        public static function emptyCart(){
            session_start();

            unset($_SESSION['cart']);

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }

        public static function editCart($post){
            session_start();

            $id = $post['id'];
            $quantity = $post['quantity'];

            $_SESSION['cart'][$id] = $quantity;

            header('Location:' . $_SERVER['HTTP_REFERER']);
        }
    }