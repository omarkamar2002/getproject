<?php
include("initSession.php");

$coaches = $CoachList->getAllCoachs();
$classes = array();

if (isset($_GET['coachId'])) {
    $coachId = $_GET['coachId'];
    $coach = $CoachList->getCoachById($coachId);
    $classes = $ClassList->getClassesByCoach($coach);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Class List</title>
    <style>
        body {
            background-color: lightblue;
        }
        input[type="submit"], select {
            padding: 10px;
            border-radius: 5px;
            border: none;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            cursor: pointer;
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th, td {
            padding: 5px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Display Class By Coach</h1>
    <form method="GET" action="displayclassbycoach.php">
        <label for="coachId">Select Coach:</label>
        <select id="coachId" name="coachId">
            <?php foreach ($coaches as $coach) { ?>
                <option value="<?php echo $coach->getId(); ?>" <?php if (isset($_GET['coachId']) && $_GET['coachId'] == $coach->getId()) { echo "selected"; } ?>><?php echo $coach->getName(); ?></option>
            <?php } ?>
        </select><br><br>
        <input type="submit" value="OK">
    </form>
    <br>
    <?php if (!empty($classes)) { ?>
        <table>
            <tr>
                <th>Class</th>
                <th>Day</th>
                <th>Time</th>
                <th>Delete</th>
            </tr>
            <?php foreach ($classes as $class) { ?>
                <tr>
                    <td><?php echo $class->getName(); ?></td>
                    <td><?php echo $class->getDay(); ?></td>
                    <td><?php echo $class->getTime(); ?></td>
                    <td><a href="deletclass.php?classId=<?php echo $class->getId(); ?>">Delete</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php } else { ?>
        <p >No classes found for the selected coach. <a href="assignecoach.php">Assign the coach for a class</a></p>
    <?php } ?>
    <br> <form method="GET" action="menu.php">
            <input type="submit" value="Back">
        </form>
</body>
</html>
