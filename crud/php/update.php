<?php
include 'connect.php';

$id = $_GET['updateid']; 
$sql = "SELECT * FROM `crud` WHERE id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];
$email = $row['email'];
$mobile = $row['mobile'];
$password = $row['password'];

if (isset($_POST['submit'])) {
    $newName = $_POST['name'];
    $newEmail = $_POST['email'];
    $newMobile = $_POST['mobile'];
    $newPassword = $_POST['password'];

    // Use prepared statements to prevent SQL injection
    $updateSql = "UPDATE `crud` SET name=?, email=?, mobile=?, password=? WHERE id=?";
    $stmt = mysqli_prepare($con, $updateSql);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssssi", $newName, $newEmail, $newMobile, $newPassword, $id);

    // Execute the statement
    $success = mysqli_stmt_execute($stmt);

    if ($success) {
        echo "Updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}
?>





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
                 name="name" autocomplete="off" value=<?php echo $name; ?>>
            </div>

            <div class="form-group my-5">
                <label>Email</label>
                <input type="email" class="form-control" 
                placeholder="Enter your email" 
                name="email" value=<?php echo $email; ?>>
            </div>

            <div class="form-group">
                <label>Mobile</label>
                <input type="text" class="form-control" 
                placeholder="Enter your mobile number" 
                name="mobile" value=<?php echo $mobile; ?>>
            </div>

            <div class="form-group my-5">
                <label>Password</label>
                <input type="text" class="form-control" 
                placeholder="Enter your password"
                 name="password" value=<?php echo $password; ?>>
            </div>

        



            <button type="submit" class="btn btn-primary" 
            name="submit">Update</button>
        </form>
    </div>

  
</body>
</html>

</html>
