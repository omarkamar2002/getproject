<?php
include("initSession.php");

if (isset($_POST['add'])) {
    $id = $_POST['coachId'];
    $name = $_POST['coachName'];
    $phone = $_POST['coachPhone'];
    $email = $_POST['coachEmail'];

    $coach = new Coach($id, $name, $phone, $email);
    $CoachList->addCoach($coach);

    echo 'Coach ' . $name . ' added successfully!';
}

if (isset($_POST['bac'])) {
    header("location:menu.php ");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Coach</title>
    <style>
        body {
            background-color: lightblue;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            margin-top: 10px;
            font-size: 20px;
        }
        input[type="text"],
        input[type="email"] {
            width: 300px;
            padding: 10px;
            font-size: 20px;
            border-radius: 5px;
            border: none;
            margin-top: 10px;
        }
        input[type="submit"] {
            background-color: green;
            color: white;
            padding: 10px;
            border-radius: 5px;
            border: none;
            font-size: 20px;
            margin-top: 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: darkgreen;
        }
    
    </style>
</head>
<body>
    <h1>Add a Coach:</h1>

    <form method="POST" action="addcoach.php">
        <label for="coachId">ID:</label>
        <input type="text" id="coachId" name="coachId" >
        <label for="coachName">Name:</label>
        <input type="text" id="coachName" name="coachName" >
        <label for="coachPhone">Phone:</label>
        <input type="text" id="coachPhone" name="coachPhone" >
        <label for="coachEmail">Email:</label>
        <input type="email" id="coachEmail" name="coachEmail">
        <input type="submit" name="add" value="Add Coach">
        <input type="submit" name="bac" value="Back">
    </form>

</body>
</html>
