<?php 

    session_start();

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$id] = $quantity;

    header('Location:' . $_SERVER['HTTP_REFERER']);


?>