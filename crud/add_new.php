<?php
include "conn.php";

if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `customer`(`id`, `Firstname`, `Lastname`, `Email`, `gender`) VALUES (NULL,'$first_name','$last_name','$email','$gender')";

    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: index.php?msg=New record created successfully");
    }
    else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #00ff5573;">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
        <div class="text-center mb-4">
            <h3>Add New User</h3>
            <p class="text-muted">Complete the form below to add a new user</p>
        </div>

        <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width: 50vh; min-width: 300px;">
                <div class="row">
                    <div class="col">
                        <label class="form-label">First Name:</label>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name">
                    </div>
                    <div class="col">
                        <label class="form-label">Last Name:</label>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name">
                    </div>
                </div>

                <div class="mb-3" style="margin-top: 10px;">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" placeholder="example@gmail.com">
                </div>

                <div class="form-group mb-3">
                    <label>Gender:</label>&nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="male" value="male">
                    <label for="male" class="form-input-label">Male</label>
                    &nbsp;
                    <input type="radio" class="form-check-input" name="gender" id="female" value="female">
                    <label for="female" class="form-input-label">Female</label>
                </div>

                <div>
                    <button class="btn btn-success" name="submit" type="submit">Save</button>&nbsp;
                    <a href="index.php" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </div>
    </div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>