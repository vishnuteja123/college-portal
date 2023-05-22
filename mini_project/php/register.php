<?php
    $host = "localhost";
    $user_name = "root";
    $pwd = "";    
    $con = mysqli_connect($host, $user_name, $pwd);
    if(!$con) {
        die("Connection Error");
    } else {
        echo "connected <br>";
    }
    $name = $_POST["name"];
    $college_id = $_POST["college_id"];
    $password = $_POST["password"];
    $sql_query = "INSERT INTO `student_portal`.`registered_students` (`name`, `college_id`, `password`) VALUES ('$name', '$college_id', '$password');";
    //echo $sql_query;
    if($con->query($sql_query) == true) {
        echo "success";
    }
    else {
        echo "oops";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            text-align: center;
        }
        h1 {
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
    </style>
</head>
<body>
    <div>
        <h1>Signup Successful</h1>
        <a href="../html/index.html">HOME</a>
    </div>
</body>
</html>