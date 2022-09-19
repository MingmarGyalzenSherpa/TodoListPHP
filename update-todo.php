<?php
//connect to db
include('./db_config.php');
$id = $_GET['id'];
$todo = $_GET['todo'];
//query string
$sql = "UPDATE todo_list SET title = '$todo' WHERE id = $id";

//executing query
$conn->query($sql);
Header('location:./index.php');




?>