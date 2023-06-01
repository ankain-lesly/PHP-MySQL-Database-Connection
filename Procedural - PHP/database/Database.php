<?php
/**
 * @author Ankain Lesly <leeleslyank@gmail.com>
 * @package null;
 * @Contact: +237 670710480
 * 
 * >> Database Connection
 * >> PHP and MySQL
 */

// Initializing Variables  
$DB_server   =  "localhost"; 
$DB_user     =  "root"; 
$DB_password =  ""; 
$DB_name     =  "uba_test";

// Creating Connection
$conn = new mysqli(
                  $DB_server, 
                  $DB_user, 
                  $DB_password, 
                  $DB_name);

if(!$conn) {
  die(mysqli_connect_error()."Connection Failed");
}
// else {
//   echo "Database Connected Successfully. 😍";
// }