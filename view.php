<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "student_registration"; // Ensure this matches your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $name = htmlspecialchars($_POST['name']);
    $student_id = htmlspecialchars($_POST['student_id']);
    $date_of_birth = htmlspecialchars($_POST['dob']);
    $address = htmlspecialchars($_POST['address']);
    $gender = htmlspecialchars($_POST['gender']);
    $level = htmlspecialchars($_POST['level']);
    $department = htmlspecialchars($_POST['department']);
    $email = htmlspecialchars($_POST['email']);
    $contact_number = htmlspecialchars($_POST['contact']);

    // Insert data into the database
    $sql = "INSERT INTO students (name, student_id, date_of_birth, address, gender, level, department, email, contact_number)
            VALUES ('$name', '$student_id', '$date_of_birth', '$address', '$gender', '$level', '$department', '$email', '$contact_number')";

    if ($conn->query($sql) === TRUE) {
        $message = "Data successfully saved to the database!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Student Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
        }
        .container {
            width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        p {
            font-size: 16px;
            margin: 10px 0;
        }
        .label {
            font-weight: bold;
            color: #555;
        }
        .value {
            color: #000;
        }
        .back-button {
            display: block;
            text-align: center;
            margin-top: 20px;
        }
        .back-button a {
            text-decoration: none;
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
        }
        .back-button a:hover {
            background-color: #45a049;
        }
        .message {
            text-align: center;
            font-weight: bold;
            color: green;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Student Information</h2>
        <?php if (isset($message)) { echo "<p class='message'>$message</p>"; } ?>
        <p><span class="label">Name:</span> <span class="value"><?php echo $name; ?></span></p>
        <p><span class="label">Student ID:</span> <span class="value"><?php echo $student_id; ?></span></p>
        <p><span class="label">Date of Birth:</span> <span class="value"><?php echo $date_of_birth; ?></span></p>
        <p><span class="label">Address:</span> <span class="value"><?php echo $address; ?></span></p>
        <p><span class="label">Gender:</span> <span class="value"><?php echo $gender; ?></span></p>
        <p><span class="label">Level:</span> <span class="value"><?php echo $level; ?></span></p>
        <p><span class="label">Department:</span> <span class="value"><?php echo $department; ?></span></p>
        <p><span class="label">Email:</span> <span class="value"><?php echo $email; ?></span></p>
        <p><span class="label">Contact Number:</span> <span class="value"><?php echo $contact_number; ?></span></p>
        <div class="back-button">
            <a href="CGPA Calculation.html">Next Page</a>
        </div>
    </div>
</body>
</html>
