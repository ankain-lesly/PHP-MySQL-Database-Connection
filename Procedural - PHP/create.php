<?php
  include_once "./database/Database.php";

  // CREATE NEW STUDENT
  // Checking for submit request ('POST')
  if(isset($_POST['create_studdent'])) {
    $name = $_POST['student_name'];
    $email = $_POST['email_address'];
    
    $students_sql = "INSERT INTO students (full_name, email)
                      VALUES ('$name', '$email')";
    $response = mysqli_query($conn, $students_sql);

    if($response) {
      header("Location: ./?message=Student Added Successfully...");
    }
  }

  // EDIT || UPDATE STUDENT
  $name =  '';
  $email = '';
  $id = '';
  // Getting Student ID on Edit ('GET')
  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $students_sql = "SELECT * FROM students WHERE id = '$id'";
    $response = mysqli_query($conn, $students_sql);
    
    if(mysqli_num_rows($response) > 0) {
      $student = mysqli_fetch_assoc($response);

      $name = $student['full_name'];
      $email = $student['email'];
    }
  }

  // UPDATE STUDENT
  if(isset($_POST['update_studdent'])) {
    $name = $_POST['student_name'];
    $email = $_POST['email_address'];
    $id = $_POST['student_id'];
    
    $students_sql = "UPDATE students SET 
                        full_name = '$name', 
                        email = '$email' 
                        WHERE id = '$id'";
    $response = mysqli_query($conn, $students_sql);

    if($response) {
      header("Location: ./?message=Student Updated Successfully...");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP MySQL - Add Student</title>
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
  <nav class="mini_navigation">
    <a href="./">Back</a>
  </nav>

  <h3>Add new student!</h3>

  // Add Student Form
  <form action="" method="post" class="mt-2">
    <div class="form-group">
      <label for="student_name">Full name</label>
      <input type="text" name="student_name" id="student_name" value="<?= $name ?>">
    </div>
    <div class="form-group">
      <label for="email_address">Email address</label>
      <input type="email" name="email_address" id="email_address" value="<?= $email ?>">
    </div>
    <div class="actions">
      <button name="create_studdent">Save</button>;
    </div>
  </form>
</body>

</html>



<?php 
        if($name === '') {
          echo '<button name="create_studdent">Save</button>';
        }else {
          echo '<input type="hidden" name="student_id" value="'.$id.'">';
      echo '<button name="update_studdent">Update Student</button>';
      }
      ?>