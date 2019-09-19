<?php
    include_once "connection.php";
    $data = "SELECT * FROM student";
    $query = mysqli_query($connection,$data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a href="add.php">Add New</a>
    <table>
        <tr>
            <td>ID</td>
            <td>Profile</td>
            <td>Fullname</td>
            <td>Gender</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Action</td>
        </tr>
        <?php
            foreach($query as $result){
        ?>
                <tr>
                <td><?php echo $result['id'] ?></td>
                <td><img src="img/<?php echo $result['profile']; ?>" style="width:120px"></td>
                <td><?php echo $result['first_name']." ".$result['last_name']; ?></td>
                <td><?php echo $result['gender']; ?></td>
                <td><?php echo $result['email']; ?></td>
                <td><?php echo $result['phone']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $result['id']; ?>" name="edit">Edit</a> / 
                    <a href="delete.php?id=<?php echo $result['id']; ?>"
                    onclick="return confirm('Are you sure!')" name="delete">Delete</a>
                </td>
                </tr>
        <?php
            }
        ?>
    </table>
    <?php
    ?>
</body>
</html>