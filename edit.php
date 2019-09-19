<?php
    include_once "connection.php";
    $id = $_GET['id'];
    $data = "SELECT * FROM student WHERE id = $id";
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
    <?php
        foreach($query as $result){
    ?>
        <form action="#" method="post" enctype="multipart/form-data">
        <input type="text" name="first_name" value="<?php echo $result['first_name']; ?>" require><br>
        <input type="text" name="last_name" value="<?php echo $result['last_name']; ?>" require><br>
        <?php
            if($result['gender'] === 'Male'){
            ?>
        <select name="gender">
            <option value="Male" selected>Male</option>
            <option value="Female">Female</option>
        </select><br>
        <?php
            }else{
        ?>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female" selected>Female</option>
        </select><br>
        <?php
            }
        ?>
        <input type="file" name="file" value="<?php echo $result['profile']; ?>" require><br>
        <input type="email" name="email" value="<?php echo $result['email']; ?>" ><br>
        <input type="text" name="phone" value="<?php echo $result['phone']; ?>" ><br>
        <input type="submit" name="edit" value="Edit">
    </form>
    <?php
        }
    ?>
</body>
</html>
<?php
    if(isset($_POST['edit'])){
        $first_naem = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $file = $_FILES['file']['name'];
        $location = $_FILES['file']['tmp_name'];
        move_uploaded_file($location,"img/".$file);

        $update = " UPDATE student SET first_name = '$first_naem',last_name ='$last_name',profile ='$file',
        gender = '$gender',email = '$email',phone ='$phone' WHERE id = $id";
        $newUpdate = mysqli_query($connection,$update);
        if($newUpdate){
            header('location:index.php');
        }else{
            echo "Cannot update!";
        }
    }
?>