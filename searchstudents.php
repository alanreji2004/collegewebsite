<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "cep";

    $result = null;
    $admn = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $admn = $_POST['admn'];

        $conn = new mysqli($host, $user, $password, $db);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM students WHERE admn = '$admn'";
        $result = $conn->query($sql);
        $conn->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Students</title>
    <link rel="stylesheet" href="searchstudents.css">
</head>
<body>
    <form method = "post">
        Enter admission number to search: <input type="text" name="admn"><br><br>
        <input type="submit" value="Search">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($result->num_rows > 0) {
            echo "<h2>Student Details:</h2>";
            while($row = $result->fetch_assoc()) {
                echo "Admission Number: " . $row["admn"]. "<br>Name: " . $row["name"]. "<br>Department: " . $row["dept"]. "<br>Place: " . $row["place"]. "<br><br>";
            }
        } else {
            echo "No student found with admission number: $admn";
        }
    }
    ?> 
</body>
</html>
