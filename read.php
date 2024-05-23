<!-- read.php -->
<?php
include 'config.php';

$sql = "SELECT * FROM student";
$result = $conn->query($sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records </title>
    <link rel="stylesheet" href="style.css">
</head>

<h1>STUDENT RECORDS</h1>
<table border="1">
    <tr>
        <th>StudentId</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>SirName</th>
        <th>Gender</th>
        <th>Age</th>
        <th>Birthdate</th>
        <th>Actions</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['StudentId']}</td>
                    <td>{$row['FirstName']}</td>
                    <td>{$row['LastName']}</td>
                    <td>{$row['SirName']}</td>
                    <td>{$row['Gender']}</td>
                    <td>{$row['Age']}</td>
                    <td>{$row['Birthdate']}</td>
                    <td>
                        <a href='update.php?id={$row['StudentId']}'>Edit</a> |
                        <a href='delete.php?id={$row['StudentId']}' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                    </td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No records found</td></tr>";
    }
    ?>
</table>
