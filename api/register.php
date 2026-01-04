<?php

include("connection.php");

$name = $_POST['name'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$address = $_POST['address'];
$image = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];
$role = $_POST['role'];

if (!preg_match("/^[0-9]{10}$/", $mobile)) {
    echo "
    <script>
        alert('Mobile number must be exactly 10 digits');
        window.location = '../routes/register.html';
    </script>";
    exit();
}

if (!preg_match(
    "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
    $password
)) {
    echo "
    <script>
        alert('Weak password! Use at least 8 characters with uppercase, lowercase, number, and special character.');
        window.location = '../routes/register.html';
    </script>";
    exit();
}


$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if($password == $cpassword){
    move_uploaded_file($tmp_name, "../uploads/$image");
    $insert = mysqli_query($connect, "INSERT INTO user(name, mobile, address, password, photo, role, status, votes) VALUES ('$name', '$mobile', '$address', '$hashed_password', '$image', '$role', 0, 0)");

    if($insert){

        echo '
        <script>
            alert("Registration Successfull!");
            window.location = "../";
        </script>
        ';
    }
    else{
        echo '
        <script>
            alert("some error occured!");
            window.location = "../rotes/register.html";
        </script>
        ';
    }
}
else{

    echo '
        <script>
            alert("Password and confirm password does not match!");
            window.location = "../rotes/register.html";
        </script>
    ';
}
?>