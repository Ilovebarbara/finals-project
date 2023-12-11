<?php
include 'connect.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];

    $sql = "INSERT INTO crud (name, email, mobile, password) 
            VALUES ('$name', '$email', '$mobile', '$password')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        //echo "Data inserted successfully";
        header('location:display.php');
    } else {
        die(mysqli_error($con));

    }
}
?>
?>



<!--crud input-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" 
    content="width=device-width, initial-scale=1.0">
    <title>Your Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" 
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

    <div class="container my-5">
        <form method="post" class="mx-auto" style="max-width: 400px;">
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" 
                placeholder="Enter your name"
                 name="name" autocomplete="off">
            </div>

            <div class="form-group my-5">
                <label>Email</label>
                <input type="email" class="form-control" 
                placeholder="Enter your email" 
                name="email">
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" 
                placeholder="Enter your mobile number" 
                name="mobile">
            </div>

            <div class="form-group my-5">
                <label>Password</label>
                <input type="text" class="form-control" 
                placeholder="Enter your password"
                 name="password">
            </div>

            <button type="submit" class="btn btn-primary" 
            name="submit">Submit</button>
        </form>
    </div>

  
</body>
</html>

</html>



<!--29:29-->