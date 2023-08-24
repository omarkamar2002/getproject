<!DOCTYPE html>
<html>
<head>
    <title>Menu</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <style>
       body {
    background-image: url("images/gym.jpg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: white;
    font-family: Arial, sans-serif;
    
            }


        h1 {
            text-align: left;
            margin-top: 0px;
            font-size: 30px;
            color: black;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        h3 {
            text-align: left;
            margin-top: 0px;
            font-size: 18px;
            color: black;
        }
        h3 a {
            color: black;
            text-decoration: none;
            border: 2px solid #666;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            display: inline-block;
            margin: 10px;
        }
        h3 a:hover {
            background-color: #666;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Gym Management System:</h1>
    <h3><a href="addclass.php">Enter a class</a></h3>
    <h3><a href="addcoach.php">Enter a coach</a></h3>
    <h3><a href="deletclass.php">Delete a class</a></h3>
    <h3><a href="assignecoach.php">Assignment a coach to a class</a></h3>
    <h3><a href="modifycoach.php">Modify coach</a></h3>
    <h3><a href="displayclassbycoach.php">Display class by coach</a></h3>
    <h3><a href="displayallclass.php">Display all class</a></h3>
</body>
</html>