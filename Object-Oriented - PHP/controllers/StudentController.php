<?php
namespace app\controllers;

include_once __DIR__."/../models/Database.php";

// using a namespace definition
use app\models\Database;

// Class Definition
class StudentController {
	
	// Connection Variables  
	private $conn;

  // Using Database Connections
  public function __construct()
  {
    $DB = new Database();
    $this->conn = $DB->connect();
  }

  // Get all Students
	public function getStudents() {
    # TODO: create a Student Model to manage Database
    // SQL and mysqli_query,  fetch data from the Database
    $students_sql = "SELECT * FROM students";
    $response = mysqli_query($this->conn, $students_sql);
    
    # Students Data: Array Object
    $student_data = [];

    if(mysqli_num_rows($response) > 0) {

      while ($row = mysqli_fetch_assoc($response)) {
        $student_data[] = $row;
      }
    }
    return $student_data;
	}

  // Get a single student with ID
	public function getSingleStudentId($id) {

    $students_sql = "SELECT * FROM students WHERE id = '$id'";
    $response = mysqli_query($this->conn, $students_sql);
    
    if(mysqli_num_rows($response) > 0) {
      $student = mysqli_fetch_assoc($response);

      return $student;
    }else {
      return false;
    }

	}

  // Add a student into Database Handler  Methode
	public function createStudent() {
    $name = $_POST['student_name'];
    $email = $_POST['email_address'];
    
    # TODO: sanitize Students Data
    # TODO: create a Student Model to manage Database
    $students_sql = "INSERT INTO students (full_name, email)
                      VALUES ('$name', '$email')";
    $response = mysqli_query($this->conn, $students_sql);

    return $response;
	}

  // Update Student Information
	public function updateStudent() {
    $name = $_POST['student_name'];
    $email = $_POST['email_address'];
    $id = $_POST['student_id'];
    
    # TODO: sanitize Students Data
    # TODO: create a Student Model to manage Database
    $students_sql = "UPDATE students SET 
                        full_name = '$name', 
                        email = '$email' 
                        WHERE id = '$id'";
    $response = mysqli_query($this->conn, $students_sql);

    return $response;
	}
}