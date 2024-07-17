<?php
include 'db.php';

// Fetch students
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>School Management System</title>
</head>
<body>
    <h1>School Management System</h1>
    <a href="add_student.php">Add Student</a>
    <h2>Student List</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Grade</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $id = isset($row["id"]) ? $row["id"] : '';
                $name = isset($row["name"]) ? $row["name"] : '';
                $age = isset($row["age"]) ? $row["age"] : '';
                $grade = isset($row["grade"]) ? $row["grade"] : '';
                $email = isset($row["email"]) ? $row["email"] : '';

                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $name . "</td>";
                echo "<td>" . $age . "</td>";
                echo "<td>" . $grade . "</td>";
                echo "<td>" . $email . "</td>";
                echo "<td><a href='edit_student.php?id=" . $id . "'>Edit</a> | <a href='delete_student.php?id=" . $id . "'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No students found</td></tr>";
        }
        ?>
    </table>
</body>
</html>
