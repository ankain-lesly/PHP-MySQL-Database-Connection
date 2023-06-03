<?php
  use app\controllers\StudentController;

  include_once "./controllers/StudentController.php";
  $Controller = new StudentController();

  // CREATE NEW STUDENT
  // Checking for submit request ('POST')
  if(isset($_POST['create_studdent'])) {
    // using our Student Controller to manage setup
    $create_student = $Controller->createStudent();

    if($create_student) {
      header("Location: ./?message=Student Added Successfully...");
    }
    # TODO: Else Display an error -> "Error creating Student"
  }

  // EDIT || UPDATE STUDENT
  $name =  '';
  $email = '';
  $id = '';
  // Getting Student with ID to edit ('GET')
  if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // using our Student Controller to manage setup
    $student = $Controller->getSingleStudentId($id);

    // Checking if we have student Data
    if($student) {
      // Setting Form Values for edit
      $name = $student['full_name'];
      $email = $student['email'];
      $id = $student['id'];
    }
    # TODO: Else Display an error -> "Student with ID $id not found"
  }

  // UPDATE STUDENT  INFORMATON
  if(isset($_POST['update_studdent'])) {
    // using our Student Controller to manage setup
    $update = $Controller->updateStudent();

    if($update) {
      header("Location: ./?message=Student Updated Successfully...");
    }
    # TODO: Else Display an error -> "Error updating Student Info"
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

  <!-- // Add Student Form -->
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
      <?php 
        if($name === '') {
          echo '<button name="create_studdent">Save</button>';
        }else {
          echo '<input type="hidden" name="student_id" value="'.$id.'">';
          echo '<button name="update_studdent">Update Student</button>';
          }
      ?>
    </div>
  </form>
</body>

</html>