# PHP - MySQL Database Connection

# Table of content

- [Introduction](#introduction)
  - [Overview](#overview)
  - [Approach](#procedural-approach)
- [Tools and Software](#tools-and-software)
- [Setup and SQL](#setup-and-sql)
- [Creating Connections](#creating-connections)
  - [Using Connections](#using-connections)
- [Quick Disclaimer](#quick-disclaimer)
- [Screenshots](#screenshots)

## Introduction

Hi, I am Lesly Chuo.
Thanks for checking out this Demo Repo on PHP - MySQL.
I am going to walk you through the basics of establishing a very simple connection to your local Database Server with PHP and Interacting with it using SQL commands. Starting from the terminal (CLI) and integrating it in your HTML project.

### Overview

I am going to demonstrate this using two approach.
**Simple Procedural PHP** and **Object Oriented PHP** follow this link to read more: [How can I sanitize user input with PHP?](https://www.geeksforgeeks.org/differences-between-procedural-and-object-oriented-programming/)

### Procedural Approach

Follow this link to repository: [procedural approach][link here]

### Object Oriented Approach

Follow this link to repository: [procedural approach][link here]

## Tools and Software

1. **Server**: XAMPP
2. **Languages**: PHP/HTML/SQL
3. **Text editor**: VS Code, Sublime text, Atom, Notepad++
4. **Terminal**: Command Prompt, GIT Bash

## Setup and SQL

1. locate xampp directory and start xampp server.
2. access the bin folder: xampp/mysql/bin
3. From here you can access the global **mysql**
4. create a database or access and existing one

Using default user: _mysql -u root_;
After this, you can write basic **SQL commands** perform actions in you **Database**
![Screenshot on Terminal 01](./screenshots/01.PNG)
![Screenshot on Terminal 02](./screenshots/02.PNG)

Lets create a databases

```SQL
CREATE DATABASE tb_name;
```

Lets create a database table

```SQL
CREATE TABLE table_name (
  id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  first_name VARCHAR(50) NOT NULL,
  ....
  created_at DATETIME  NOT NULL DEFAULT CURRENT_TIMESTAMP(),
)
```

![Screenshot on Terminal 03](./screenshots/03.PNG)

Add Data into Table

```SQL
INSERT INTO table_name (first_name, email)
VALUES ('test', 'test@gmail.com');
```

Add Multiple rows
![Screenshot on Terminal 04](./screenshots/04.PNG)

```SQL
INSERT INTO table_name (first_name, email) VALUES
('test', 'test@gmail.com'),
('test2', 'test3@gmail.com'),
('test3', 'test3@gmail.com');
```

![Screenshot on Terminal 04](./screenshots/04.PNG)

Fetch Data form the Table

```SQL
SELECT * FROM table_name;
```

Fetch Specific Data

```SQL
SELECT * FROM table_name WHERE id = '1';
```

OR

```SQL
SELECT * FROM table_name WHERE first_name LIKE 'John';
```

![Screenshot on Terminal 05](./screenshots/05.PNG)

## Creating Connections

PHP has several methods capable of performing database connections like **mysqli_connect()**, **new mysqli()**, and **PDO**.

We will be using **new mysqli()**. Just user preference.

```PHP
$DB_server   =  "localhost";        # Hostname
$DB_user     =  "root";             # Username
$DB_password =  "";                 # Database password
$DB_name     =  "database_name";    # Database name

// Creating Connection
$conn = new mysqli(
                  $DB_server,
                  $DB_user,
                  $DB_password,
                  $DB_name);

if(!$conn) {
  die(mysqli_connect_error()."Connection Failed");
}
else {
  echo "Database Connected Successfully. 😍";
}
```

### Using connection

Integrating connections in a PHP file. save the script above to Database.php

using PHP _include_ or _require_ methods, add this file into your workspace. There you can perform different types of database manipulations with PHP and SQL. This repo contains Demo Source files executing this approach.

```PHP
include_once "database/Database.php";
```

Let's Perform a query.
Create and index.php file and write the code below.

```PHP
include_once "database/Database.php";

$students_sql = "SELECT * FROM students";
$response = mysqli_query($conn, $students_sql);

$student_data = [];

if(mysqli_num_rows($response) > 0) {
  // Using a while to students objects as Associative Arrays
  // storing the inside the $student_data array
  while ($row = mysqli_fetch_assoc($response)) {
    $student_data[] = $row;
  }
}

// Printing out Results from the Database.
echo '<pre>';
print_r($student_data);
echo '</pre>';
```

## Quick Disclaimer

This article is just for demonstration aimed at introducing pure procedural programming with PHP and MySQL Database Administration on the Command Line (CLI),

Data Inserted to any database should always be validated to ensure security and optimization. PHP had many Data Validating methods like **htmlspecialchars()**, **trim()**, **strip_tags()**, **addslashes()** and more

Read this article to understand more about PHP and Data validation methods [How can I sanitize user input with PHP?](https://www.w3docs.com/snippets/php/how-can-i-sanitize-user-input-with-php.html)

## Screenshots.

### Display Data from the Database

![Screenshot on Terminal 09](./screenshots/09.PNG)
![Screenshot on Terminal 10](./screenshots/10.PNG)
![Screenshot on Terminal 11](./screenshots/11.PNG)
![Screenshot on Terminal 06](./screenshots/06.PNG)

### Add Data to the Database

![Screenshot on Terminal 12](./screenshots/12.PNG)
![Screenshot on Terminal 13](./screenshots/13.PNG)
![Screenshot on Terminal 07](./screenshots/07.PNG)
![Screenshot on Terminal 14](./screenshots/14.PNG)

### Results on Submit

![Screenshot on Terminal 08](./screenshots/08.PNG)
