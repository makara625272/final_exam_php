<?php
    include_once "connection.php";
    $id = $_GET['id'];
        $data = " DELETE FROM student WHERE id = $id;";
        $query = mysqli_query($connection,$data);
        if($query){
            header('location:index.php');
        }else{
            echo "Cannot delete!";
        }
?>
