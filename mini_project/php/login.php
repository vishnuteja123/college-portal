<?php
    $host = "localhost";
    $user_name = "pma";
    $pwd = "";
    $db_name = "student_portal";
    $con = mysqli_connect($host, $user_name, $pwd, $db_name);
    
    $id = $_POST["college_id"];
    $password = $_POST["password"];

    $sql_query = "SELECT `password` FROM `registered_students` WHERE `college_id` = '$id';";
    $result = mysqli_query($con, $sql_query);
    $row = mysqli_fetch_row($result);

    if($password == $row[0]) {
        $sql_query = "SELECT `name` FROM `registered_students` WHERE `college_id` = '$id';";
        $result = mysqli_query($con, $sql_query);
        $row = mysqli_fetch_row($result);
        echo "Welcome $row[0]";
    } else {
        echo "Wrong password";
    }
?>