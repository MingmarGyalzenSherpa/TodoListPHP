<?php

   
    if($_SERVER["REQUEST_METHOD"] === "POST")
    {
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $todo_item  = $_POST['todo'];
        echo $todo_item;
    }

?>
