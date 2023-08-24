<?php

include("initSession.php");

$classes = $ClassList->getAllClass();
$coaches = $CoachList->getAllCoachs();

$currentCoach = null;

if(isset($_POST['classId'])) {
    $classId = $_POST['classId'];
    $class = $ClassList->getClassById($classId);
    if($class) {
        $currentCoach = $class->getCoach();
    }
}

if (isset($_POST['ass'])) {
    $classId = $_POST["classId"];
    $coachId = $_POST["coachId"];

    $class = $ClassList->getClassById($classId);
    $coach = $CoachList->getCoachById($coachId);

    if ($class && $coach) {
        $class->setCoach($coach);
        echo "Coach " . $coach->getName() . " assigned to class " . $class->getName() . ".";
    } else {
        echo "Failed to assign coach to class.";
    }
}
if (isset($_POST['bac'])) {
    header("location:menu.php ");
}
?>

<!DOCTYPE html>
<html>
<head>
<head>
    <title>Assign Coach</title>
    <style>
        body {
            background-color: lightblue;
        }
        input[type="text"], select {
            padding: 8px;
            border-radius: 4px;
            border: none;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #2e8b57;
        }
    </style>
</head>

</head>
<body>
    <h1>Assign Coach to Class:</h1>
    <form method="POST" action="assignecoach.php">
        <label for="classId">Select Class:</label>
        <select id="classId" name="classId">
            <?php foreach ($classes as $class) { ?>
                <option value="<?php echo $class->getId(); ?>"><?php echo $class->getName(); ?></option>
            <?php } ?>
        </select>
        <br><br>
        <label for="coachId">Select Coach:</label>
        <select id="coachId" name="coachId">
            <?php foreach ($coaches as $coach) { ?>
                <option value="<?php echo $coach->getId(); ?>"><?php echo $coach->getName(); ?></option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" name="ass" value="Assign Coach">
        <input type="submit" name="bac" value="Back">

    </form>
</body>
</html>
