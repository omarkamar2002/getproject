<?php
include("initSession.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);


$id = $name = $day = $time = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $day = $_POST['day'];
    $time = $_POST['time'];

    // Validate and sanitize the input (for security)
    $id = htmlspecialchars($id);
    $name = htmlspecialchars($name);
    $day = htmlspecialchars($day);
    $time = htmlspecialchars($time);

    // Include the necessary file with insertClass function definition
    include("mysql.php");

    // Call the insertClass function to insert the data into the database
    insertClass($id, $name, $day, $time);
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Save Class</title>
  <style>
    body {
      background-color: lightblue;
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center ;
      font-family: Arial, sans-serif;
    }
    form {
      margin: 20px auto;
      max-width: 400px;
      padding: 20px;
      background-color: white;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="text"] {
      display: block;
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
      margin-bottom: 20px;
      font-size: 16px;
    }
    input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px 20px;
      font-size: 16px;
      cursor: pointer;
    }
    input[type="submit"]:hover {
      background-color: #3e8e41;
    }
    input[type="submit"]:focus {
      outline: none;
      box-shadow: 0 0 5px #4CAF50;
    }
    input[type="submit"]:active {
      background-color: #3e8e41;
      box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>
  <h1>Add a Class:</h1>
  <form method="POST" action="mysql.php">
    <label for="id">ID:</label>
    <input type="text" name="id" id="id"/>
    <label for="name">Name:</label>
    <input type="text" name="name" id="name"/>
    <label for="day">Day:</label>
    <input type="text" name="day" id="day"/>
    <label for="time">Time:</label>
    <input type="text" name="time" id="time"/>
    <input type="submit" name="newclass" value="Ok"/>
    <input type="submit" name="back" value="Back"/>
  </form>
</body>
</html>
