<?php
    include('./db_config.php');
    $id = $_GET['id'];
    $sql = "DELETE from todo_list where id = $id";
    $conn->query($sql);
    header('location:./index.php');
?>