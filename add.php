<?php
    include_once "connection.php";
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
    <form action="#" method="post" enctype="multipart/form-data">
        <input type="text" name="first_name" placeholder="firstname" require><br>
        <input type="text" name="last_name" placeholder="lastname" require><br>
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <input type="file" name="file" require><br>
        <input type="email" name="email" placeholder="email" require><br>
        <input type="text" name="phone" placeholder="phone" require><br>
        <input type="submit" name="add" value="Add">
    </form>
</body>
</html>
<?php
    if(isset($_POST['add'])){
        $first_naem = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $file = $_FILES['file']['name'];
        $location = $_FILES['file']['tmp_name'];
        move_uploaded_file($location,"img/".$file);

        $data = "INSERT INTO student SET first_name ='$first_naem',last_name='$last_name',
        profile='$file',gender='$gender',email='$email',phone='$phone'";
        $insert = mysqli_query($connection,$data);
        if($insert){
            header('location:index.php');
        }else{
            echo "Cannot insert data";
        }
    }
?>