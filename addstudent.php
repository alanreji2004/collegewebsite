<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "cep";

    $conn = new mysqli($host, $user, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }  

    $admn = $_POST['admn'];
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $place = $_POST['place'];

    $sql = "INSERT INTO students (admn, name, dept, place) VALUES ('$admn', '$name', '$dept', '$place')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        echo "<br><a href='addstudents.html'>Go back</a>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
?>