<?php

    require_once 'connection.php';
    require_once '../models/item.php';
    
    class Item {
        public static function addItem($post){

            global $cn;

            $item = new ItemModel($post);

            $image_path = '../assets/images/' . $_FILES['image']['name'];

            move_uploaded_file($_FILES['image']['tmp_name'], $image_path);

            $query = "INSERT INTO items (name, price, description, image, category_id) VALUES ('$item->name', $item->price, '$item->description', '$image_path', $item->category_id)";

            mysqli_query($cn, $query);
            
            header('Location: /');
        }

        public static function editItem($get,$post){

            global $cn;
            $id = $get['id'];

            $name         =  $post['product_name'];
            $price        =  $post['price'];
            $description  =  $post['description'];
            $category_id  =  $post['category_id'];

            
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
        }

        public static function deleteItem($get){
            global $cn;
            $id = $get['id'];

            $query = "DELETE FROM items WHERE id = $id";
            
            var_dump(mysqli_query($cn, $query));
            die();
            header('Location:/');
        }
    }