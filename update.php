<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sirname = $_POST['SirName']; // Use the correct key name 'SirName'
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $birthdate = $_POST['birthdate'];

        if (!empty($_POST['password'])) {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sql = "UPDATE student SET FirstName='$firstname', LastName='$lastname', SirName='$sirname', Gender='$gender', Age=$age, Birthdate='$birthdate', Password='$password' WHERE StudentId=$id";
        } else {
            $sql = "UPDATE student SET FirstName='$firstname', LastName='$lastname', SirName='$sirname', Gender='$gender', Age=$age, Birthdate='$birthdate' WHERE StudentId=$id";
        }

        if ($conn->query($sql) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // Fetch the student record
    $sql = "SELECT * FROM student WHERE StudentId=$id";
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the record
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
        } else {
            die("Record not found.");
        }
    } else {
        die("Error: " . $sql . "<br>" . $conn->error);
    }
} else {
    die("Invalid request");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Update Student Correctly</h2>

    <div class="container">
        
        <form method="post" action="update.php?id=<?php echo $id; ?>">
            <label for="firstname">First Name:</label><br>
            <input type="text" id="firstname" name="firstname" value="<?php echo $row['FirstName']; ?>" required><br>
            <label for="lastname">Last Name:</label><br>
            <input type="text" id="lastname" name="lastname" value="<?php echo $row['LastName']; ?>" required><br>
            <label for="sirname">SirName:</label><br>
            <input type="text" id="SirName" name="SirName" value="<?php echo $row['SirName']; ?>" required><br>
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="Male" <?php if ($row['Gender'] == 'Male') echo 'checked'; ?> required> 
            <label for="male">Male:</label>
            <input type="radio" id="female" name="gender" value="Female" <?php if ($row['Gender'] == 'Female') echo 'checked'; ?> required> 
            <label for="female">Female:</label><br>
            <label for="age">Age:</label><br>
            <input type="number" id="age" name="age" value="<?php echo $row['Age']; ?>" required><br>
            <label for="birthdate">Birthdate:</label><br>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo $row['Birthdate']; ?>" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
            <input type="submit" value="Update Student">
        </form>
    </div>
</body>
</html>
