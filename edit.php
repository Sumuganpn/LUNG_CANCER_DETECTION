<?php
include 'connection.php';
$patientId = "";
$firstName = "";
$lastName = "";
$email = "";
$gender = "";
$outputs = "";

// Check if the ID parameter exists in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query the database to retrieve the user's details using the ID
    $query = "SELECT * FROM user_info WHERE first_name = '$id'";
    $result = mysqli_query($connect, $query);

    // Check if the query executed successfully
    if ($result) {
        // Fetch the user details
        $user = mysqli_fetch_assoc($result);

        // Display the user details
        if ($user) {
            $patientId = $user['id'];
            $firstName = $user['first_name'];
            $lastName = $user['last_name'];
            $email = $user['email'];
            $gender = $user['gender'];
        } else {
            echo "User not found.";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
} else {
    echo "Invalid user ID.";
}

// Handle form submission
if (isset($_POST['submits'])) {
    // Get the file details
    $fileName = $_FILES['photo']['name'];
    $fileTmpName = $_FILES['photo']['tmp_name'];
    $fileType = $_FILES['photo']['type'];
    $fileSize = $_FILES['photo']['size'];

    // Move the uploaded file to a directory
    $targetDir = "uploads/";
    $targetPath = $targetDir . $fileName;
    move_uploaded_file($fileTmpName, $targetPath);

    // Execute the Python script and capture the output
    $outputs = shell_exec("python example.py");
}

if (isset($_POST['storeData'])) {
    // Get the stored outputs from the hidden input field
    $storedOutputs = $_POST['outputs'];

    // Store the user details and the output in the database table
    $sql = "INSERT INTO data_table (patient_id, first_name, last_name, email, gender, outputs) VALUES ('$patientId', '$firstName', '$lastName', '$email', '$gender', '$storedOutputs')";
    if (mysqli_query($connect, $sql)) {
        echo "Data stored in the database successfully.";
    } else {
        echo "Error storing data in the database: " . mysqli_error($connect);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>User Details</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('edit_bg.png') no-repeat;
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .card {
            margin-top: 20px;
            padding: 20px;
            background-color: #e9e9e9;
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

        .upload-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .upload-label {
            padding: 10px 20px;
            background-color: #007bff;
            color: #ffffff;
            border-radius: 4px;
            cursor: pointer;
        }

        .upload-label:hover {
            background-color: #0069d9;
        }

        .image-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        #preview {
            max-width: 400px;
            max-height: 400px;
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

    <script>
        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    var imageContainer = document.getElementById('imageContainer');
                    imageContainer.innerHTML = '<img src="' + e.target.result + '" alt="Uploaded Image" style="max-width: 400px;">';
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                var imageContainer = document.getElementById('imageContainer');
                imageContainer.innerHTML = '';
            }
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>User Details</h2>
        <div class="card">
            <p><strong>Patient ID:</strong> <?php echo $patientId; ?></p>
            <p><strong>First Name:</strong> <?php echo $firstName; ?></p>
            <p><strong>Last Name:</strong> <?php echo $lastName; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
        </div>

        <div class="card">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="upload-container">
                    <input for="photo" class="upload-label" type="file" name="photo" id="photo" accept="image/*"
                        onchange="previewImage(event)">
                </div>
                <div id="imageContainer" class="image-container">
                    <?php
                    if (isset($_FILES['photo']['name'])) {
                        $fileName = $_FILES['photo']['name'];
                        $fileTmpName = $_FILES['photo']['tmp_name'];
                        $fileType = $_FILES['photo']['type'];
                        $fileSize = $_FILES['photo']['size'];

                        $targetDir = "uploads/";
                        $targetPath = $targetDir . $fileName;
                        move_uploaded_file($fileTmpName, $targetPath);

                        echo '<img src="' . $targetPath . '" alt="Uploaded Image" style="max-width: 400px;">';
                    }
                    ?>
                </div>

                <center><input type="submit" name="submits" value="Predict" class="submit-button"></center>
                <br>
                <?php if ($outputs) { ?>
                    <p><strong>RESULT:</strong> <b><?php echo $outputs; ?></b></p>
                <?php } ?>

                <center>
                    <input type="hidden" name="outputs" value="<?php echo $outputs; ?>">
                    <input type="submit" name="storeData" value="Store Data" class="submit-button">
                </center>
            </form>
        </div>
    </div>
</body>

</html>
