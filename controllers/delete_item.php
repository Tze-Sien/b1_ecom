<?php 

    require 'connection.php';
    $id = $_GET['id'];

    $query = "DELETE FROM items WHERE id = $id";
    mysqli_query($cn, $query);

    header('Location:/');

?>