<?php
include "conn.php";
$id = $_GET['id'];
if(isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

    $sql = "UPDATE `customer` SET `Firstname`='$first_name',`Lastname`='$last_name',`Email`='$email',`gender`='$gender' WHERE id=$id";

    $result = mysqli_query($conn, $sql);
    if($result) {
        header("Location: index.php?msg=Data Update successfully");
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
    <link href="style.css" rel="stylesheet" >
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    
    <nav class="navbar navbar-light justify-content-center fs-3 mb-5"
    style="background-color: #00ff5573;">
        PHP Complete CRUD Application
    </nav>

    <div class="container">
      
<div class="container">
        <?php 
        if(isset($_GET['msg'])) {
            $msg = $_GET['msg'];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            '.$msg.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
        ?>
        <a href="add_new.php" class="btn btn-dark mb-3">Add new</a>

        <table class="table table-hover text-center">
            <thead class="table-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                    </tr>
            </thead>
        <tbody>
            <?php 
            include "conn.php";
            $sql = "SELECT * FROM `customer` where id = $id";
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <th><?php echo $row['id'] ?></th>
                    <th><?php echo $row['Firstname'] ?></th>
                    <th><?php echo $row['Lastname'] ?></th>
                    <th><?php echo $row['Email'] ?></th>
                    <th><?php echo $row['gender'] ?></th>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="delete.php?id=<?php echo $row['id'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                    </td>
                </tr>
               
        </tbody>
</table>
   </div>


   <div class="popup">
    <div class="popup-content">
        <form action="" method="post" style="width: 50vh; min-width: 300px;">
            <div class="row">
                <div class="col">
                    <label class="form-label">First Name:</label>
                    <input type="text" class="form-control" name="first_name" value="<?php echo isset($row['Firstname']) ? $row['Firstname'] : ''; ?>">
                </div>
                <div class="col">
                    <label class="form-label">Last Name:</label>
                    <input type="text" class="form-control" name="last_name" value="<?php echo isset($row['Lastname']) ? $row['Lastname'] : ''; ?>">
                </div>
            </div>

            <div class="mb-3" style="margin-top: 10px;">
                <label class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo isset($row['Email']) ? $row['Email'] : ''; ?>">
            </div>

            <div class="form-group mb-3">
                <label>Gender:</label>&nbsp;
                <?php
                    $gender = isset($row['gender']) ? $row['gender'] : '';
                ?>
                <input type="radio" class="form-check-input" name="gender" id="male" value="male" <?php echo ($gender == 'male') ? "checked" : ""; ?>>
                <label for="male" class="form-input-label">Male</label>
                &nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female" <?php echo ($gender == 'female') ? "checked" : ""; ?>>
                <label for="female" class="form-input-label">Female</label>
            </div>
            <?php
            }             
            ?>
            <div>
                <button class="btn btn-success" name="submit" type="submit">Save</button>&nbsp;
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
        </form>
    </div>
</div>

    </div>





<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>