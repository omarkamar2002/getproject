<?php
include("initSession.php");

if (isset($_POST['delete'])) {
    $id = $_POST['id'];
    $ClassList->deleteClass($id);
    echo 'Class with ID ' . $id . ' has been deleted successfully!';
} elseif (isset($_POST['back'])) {
    header('Location: menu.php');
    exit;
}
$classes = $ClassList->getAllClass();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Class</title>
    <style>
        body {
            background-color: lightblue;
            font-family: Arial, sans-serif;
        }
        h1 {
            color: white;
            background-color: green;
            padding: 20px;
            text-align: center;
        }
        form {
            margin: 0 auto;
            width: 50%;
            background-color: white;
            padding: 20px;
            border: 2px solid navy;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 18px;
        }
        select {
            font-size: 18px;
            padding: 5px 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid navy;
            width: 100%;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: green;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-right: 10px;
        }
        input[type="submit"]:hover {
            background-color: gray;
        }
        input[type="submit"]:last-of-type {
            background-color: green;
            color: white;
        }
        input[type="submit"]:last-of-type:hover {
            background-color: gray;
        }
    </style>
</head>
<body>
    <h1>Delete a Class:</h1>
    <form method="POST" action="deletclass.php">
        <label for="class">Select a class:</label>
        <select name="id" id="class">
            <?php foreach ($classes as $class) : ?>
                <option value="<?= $class->id ?>"><?= $class->name ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="delete" value="Delete Class">
        <input type="submit" name="back" value="Back"/>
    </form>
</body>
</html>
