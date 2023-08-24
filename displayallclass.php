<?php
include("initSession.php");

$classes = $ClassList->getAllClass();

?>

<!DOCTYPE html>
<html>
<head>
    <title>All Classes</title>
    <style>
        body {
            background-color: lightblue;
        }
        table {
            border-collapse: collapse;
            width: auto;
            margin-bottom: 20px;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid black;
        }
        th {
            background-color: #444;
            color: white;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Display All Classes</h1>
    <table>
        <tr>
            <th>Class</th>
            <th>Day</th>
            <th>Time</th>
            <th>Coach</th>
        </tr>
        <?php foreach ($classes as $class) { ?>
            <tr>
                <td><?php echo $class->getName(); ?></td>
                <td><?php echo $class->getDay(); ?></td>
                <td><?php echo $class->getTime(); ?></td>
                <td>
                    <?php if ($class->getCoach()) { ?>
                        <?php echo $class->getCoach()->getName(); ?>
                    <?php } else { ?>
                        <span style="color:red">No coach assigned. <a href="assignecoach.php?classId=<?php echo $class->getId(); ?>">Assign a coach</a></span>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </table><br>
    <form method="GET" action="menu.php">
            <input type="submit" value="Back">
        </form>
</body>
</html>
