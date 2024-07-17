<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $grade = $_POST["grade"];
    $email = $_POST["email"];

    $sql = "UPDATE students SET name='$name', age=$age, grade='$grade', email='$email' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    // Check if id is set in the URL
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "SELECT * FROM students WHERE id=$id";
        $result = $conn->query($sql);
        
        // Check if the query was successful
        if ($result === FALSE) {
            die("Error: " . $conn->error);
        }
        
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $student = $result->fetch_assoc();
        } else {
            die("No student found with the given ID.");
        }
    } else {
        die("No ID specified.");
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        Name: <input type="text" name="name" value="<?php echo $student['name']; ?>" required><br>
        Age: <input type="number" name="age" value="<?php echo $student['age']; ?>" required><br>
        Grade: <input type="text" name="grade" value="<?php echo $student['grade']; ?>" required><br>
        Email: <input type="email" name="email" value="<?php echo $student['email']; ?>" required><br>
        <input type="submit" value="Update Student">
    </form>
</body>
</html>
