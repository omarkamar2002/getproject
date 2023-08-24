<!doctype html>
<html>
<head>
	<title>Login</title>
	</head>
<body>

<?php
$username = 'root';
$password = 'root';
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=mydata', $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Attempt select query execution
    $sql = "SELECT * FROM classes";   
    $result = $pdo->query($sql);

    if ($result->rowCount() > 0) {
        echo "<table border=1>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>name</th>";
        echo "<th>Day</th>";
        echo "<th>Time</th>";
        echo "</tr>";

        while ($row = $result->fetch()) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['Day'] . "</td>";
            echo "<td>" . $row['Time'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
        unset($result);
    } else {
        echo "No records matching your query were found.";
    }

} catch (PDOException $e) {
    die("ERROR: Could not able to execute query. " . $e->getMessage());
}

// Function to insert class data into the database
if(isset($_POST["newclass"]))
{
   function insertClass($id, $name, $day, $time) {
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO classes (id, name, Day, Time) VALUES (:id, :name, :day, :time)");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':day', $day);
        $stmt->bindParam(':time', $time);
        $stmt->execute();

    } catch (PDOException $e) {
        die("ERROR: Could not execute insert query. " . $e->getMessage());
    }
  }
 
} 

// Close connection
unset($pdo); 
?>

</body>
</html>