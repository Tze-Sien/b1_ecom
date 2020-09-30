<?php 

    require './connection.php';

    $name         =  $_POST['product_name'];
    $price        =  $_POST['price'];
    $description  =  $_POST['description'];
    $category_id  =  $_POST['category_id'];

    $image_path = '../assets/images/' . $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

    $query = "INSERT INTO items (name, price, description, image, category_id) VALUES ('$name', $price, '$description', '$image_path', $category_id)";

    mysqli_query($cn, $query);
    
    header('Location: /');

?>