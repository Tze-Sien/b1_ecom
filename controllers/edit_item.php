<?php 

    require './connection.php';
    $id = $_GET['id'];

    $name         =  $_POST['product_name'];
    $price        =  $_POST['price'];
    $description  =  $_POST['description'];
    $category_id  =  $_POST['category_id'];
    if($_FILES['image']['size'] < 1){
        $query = "UPDATE items SET name='$name', price='$price', description='$description', category_id= $category_id WHERE id = $id";

        mysqli_query($cn, $query);
        
        header('Location: /');
    }else{
        $image_path = '../assets/images/' . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
        $query = "UPDATE items SET name='$name', price='$price',image='$image_path' , description='$description', category_id= $category_id WHERE id = $id";

        mysqli_query($cn, $query);
        
        header('Location: /');
    }

   

   

?>