<?php
  include_once "./controllers/StudentController.php";

  use app\controllers\StudentController;

  $StudentObj = new StudentController();

  $students_data = $StudentObj->getStudents();

  $message = '';
  if(isset($_GET['message'])) {
    $message = $_GET['message'];
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP MySQL</title>
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
  <?php if($message) { ?>
  <!-- Print message if available -->
  <div class="message"><?= $message ?></div>
  <?php } ?>
  <h1>Welcome!</h1>
  <p>All Students in Database</p>

  <!-- Table to display data from Database -->
  <table>
    <thead>
      <tr>
        <th>id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Added On</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <!-- PHP Foreach Loop -->
      <?php foreach ($students_data as $student) { ?>
      <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['full_name'] ?></td>
        <td><?= $student['email'] ?></td>
        <td><?= $student['added_on'] ?></td>
        <td>
          <a href="./create.php?id=<?= $student['id'] ?>">Edit</a>
        </td>
      </tr>
      <?php  } ?>
    </tbody>
  </table>

  <nav class="mini_navigation mt-2">
    <a href="./create.php">Add Student</a>
  </nav>
</body>

</html>