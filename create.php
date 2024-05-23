<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $sirname = $_POST['sirname']; // Ensure correct case to match the form
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $birthdate = $_POST['birthdate'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO student (FirstName, LastName, SirName, Gender, Age, Birthdate, Password) VALUES ('$firstname', '$lastname', '$sirname', '$gender', '$age', '$birthdate', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Viable Students</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Add Student Details Here</h1>
    <div class="container">
        <form method="post" action="create.php">
            <label for="firstname">FirstName:</label><br>
            <input type="text" id="firstname" name="firstname" required><br><br>
            <label for="lastname">LastName:</label><br>
            <input type="text" id="lastname" name="lastname" required><br><br>
            <label for="sirname">SirName:</label><br>
            <input type="text" id="sirname" name="sirname" required><br><br>
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="Male" required>
            <label for="male">Male</label><br>
            <input type="radio" id="female" name="gender" value="Female" required>
            <label for="female">Female</label><br><br>
            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" required><br><br>
            <label for="birthdate">Birthdate:</label><br>
            <input type="date" id="birthdate" name="birthdate" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Add">
        </form>
    </div>
</body>
</html>
