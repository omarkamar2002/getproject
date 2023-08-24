<?php
include("initSession.php");

$classes = $ClassList->getAllClass();
$coaches = $CoachList->getAllCoachs();

$currentCoach = null;
$newCoach = null;

if (isset($_POST['classId'])) {
    $classId = $_POST['classId'];
    $class = $ClassList->getClassById($classId);
    $currentCoach = $class->getCoach();
}

if (isset($_POST['newCoachId'])) {
    $classId = $_POST['classId'];
    $newCoachId = $_POST['newCoachId'];
    $class = $ClassList->getClassById($classId);
    $newCoach = $CoachList->getCoachById($newCoachId);

    if ($class && $newCoach) {
        $class->setCoach($newCoach);
        echo "Coach " . $newCoach->getName() . " assigned to class " . $class->getName() . ".";
    } else {
        echo "Failed to assign coach to class.";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<head>
    <title>Modify Coach for Class</title>
    <style>
        body {
            background-color: lightblue;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
</head>
<body>
    <h1>Modify Coach for Class:</h1>
    <form method="POST" action="modifycoach.php">
        <label for="classId">Select Class:</label>
        <select id="classId" name="classId">
            <?php foreach ($classes as $class) { ?>
                <option value="<?php echo $class->getId(); ?>"><?php echo $class->getName(); ?></option>
            <?php } ?>
        </select>
        <input type="submit" value="OK">
    </form>
    <?php if ($currentCoach) { ?>
        <p>Current coach for <?php echo $class->getName(); ?> is <?php echo $currentCoach->getName(); ?></p>
        <form method="POST" action="modifycoach.php">
            <input type="hidden" name="classId" value="<?php echo $classId; ?>">
            <label for="newCoachId">Select New Coach:</label>
            <select id="newCoachId" name="newCoachId">
                <?php foreach ($coaches as $coach) { ?>
                    <option value="<?php echo $coach->getId(); ?>"><?php echo $coach->getName(); ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="OK">
        </form>
        <form method="GET" action="menu.php">
            <input type="submit" value="Back">
        </form>
    <?php } ?>
</body>
</html>


