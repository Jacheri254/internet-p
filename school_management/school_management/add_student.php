<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $age = $_POST["age"];
    $grade = $_POST["grade"];
    $email = $_POST["email"];

    $sql = "INSERT INTO students (name, age, grade, email) VALUES ('$name', $age, '$grade', '$email')";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Age: <input type="number" name="age" required><br>
        Grade: <input type="text" name="grade" required><br>
        Email: <input type="email" name="email" required><br>
        <input type="submit" value="Add Student">
    </form>
</body>
</html>
