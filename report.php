<?php
include 'connection.php';

// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query the database to retrieve the user's details using the ID
    $query = "SELECT * FROM data_table WHERE first_name = '$id'";
    $result = mysqli_query($connect, $query);

    // Check if the query executed successfully
    if ($result) {
        // Fetch the user details
        $user = mysqli_fetch_assoc($result);

        // Display the user details
        if ($user) {
            $patientId = $user['patient_id'];
            $firstName = $user['first_name'];
            $lastName = $user['last_name'];
            $email = $user['email'];
            $gender = $user['gender'];
            $outputs = $user['outputs'];
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
} else {
    echo "Invalid user ID.";
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('report.png') no-repeat;
            height: 100vh;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            padding: 60px;
            background-color: rgba(255, 255, 255, 0.9); /* Added transparency to the background color */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card h2 {
            margin-top: 0;
            color: #333333;
        }

        .card p {
            margin: 10px 0;
            color: #555555;
        }

        .submit-button {
            display: block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #218838;
        }
    </style>

</head>

<body>
    <div class="container">
        <div class="card">
            <u><h2>User Details</h2></u>
            <p><strong>Patient ID:</strong> <?php echo $patientId; ?></p>
            <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
            <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Result:</strong> <?php echo $outputs; ?></p>
        </div>
    </div>
</body>

</html>
