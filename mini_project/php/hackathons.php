<?php
    $host = "localhost";
    $user_name = "root";
    $pwd = "";
    $db_name = "student_portal";
    $con = mysqli_connect($host, $user_name, $pwd, $db_name);

    $name = $_POST["name"];
    $college_id = $_POST["college_id"];
    $year = $_POST["year"];
    $section = $_POST["section"];
    $branch = $_POST["branch"];
    $password = $_POST["password"];

    if(!$con) {
        die("Connection Error");
    } else {
        //echo "Success";
    }


    $sql_query = "SELECT `password` FROM `registered_students` WHERE `college_id` = '$college_id';";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_row($result);
    if($row == null) {
        die("SignUp First");
    }
    if($password != $row[0]) {
        die("Invalid password");
    }

    $sql_query = "SELECT * from `hackathon` WHERE `college_id` = '$college_id';";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_row($result);
    if($row != null && sizeof($row) != 0) {
        die("<h3>Student already registered</h3>");
    }
    $sql_query = "INSERT INTO `hackathon` (`name`, `college_id`, `year`, `section`, `branch`) VALUES ('$name', '$college_id', '$year', '$section', '$branch');";
    $result = mysqli_query($con, $sql_query);
    if(!$result) {
        die("Query Error!");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            text-align: center;
            background-color: #E8F6EF;
        }
        h1 {
            color: #89B5AF;
        }
        #regards {
            color: brown;
        }
        a {
            background: #3498db;
            background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
            background-image: -moz-linear-gradient(top, #3498db, #2980b9);
            background-image: -ms-linear-gradient(top, #3498db, #2980b9);
            background-image: -o-linear-gradient(top, #3498db, #2980b9);
            background-image: linear-gradient(to bottom, #3498db, #2980b9);
            -webkit-border-radius: 8;
            -moz-border-radius: 8;
            border-radius: 8px;
            font-family: Georgia;
            color: #ffffff;
            font-size: 20px;
            padding: 10px 20px 10px 20px;
            text-decoration: none;
            }

            a:hover {
            background: #3cb0fd;
            background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
            background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
            text-decoration: none;
            }
        }
    </style>
</head>
<body>
    <h1>Successfully Registered</h1>
    <h1 id = "regards">Happy coding</h1>
    <h2>Event Date: 10/05/2022</h2>
    <a href="../html/index.html">HOME</a>
</body>
</html>