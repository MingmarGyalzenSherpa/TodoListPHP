<?php

    include('./db_config.php');
   
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $todo = $_POST['todo'];
        $sql = "INSERT INTO todo_list (title) VALUES ('$todo')";
        $conn->query($sql);
        header('location:./index.php');

    }

?>
