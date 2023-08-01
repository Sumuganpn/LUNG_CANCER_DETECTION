<?php include 'connection.php';?>

<?php

$query = 'SELECT * FROM user_info ';		
$results = mysqli_query($connect, $query);
?>
<!DOCTYPE html>
<html>

<head>
	<title>This data was fetched from the database</title>
	<style type="text/css">
		body {
			font-size: 15px;
			color: #343d44;
			font-family: "segoe-ui", "open-sans", tahoma, arial;
			padding: 0;
			margin: 0;
		}

		table {
			margin: auto;
			font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
			font-size: 12px;
		}

		h1 {
			margin: 25px auto 0;
			text-align: center;
			text-transform: uppercase;
			font-size: 17px;
		}

		table td {
			transition: all .5s;
		}

		/* Table */
		.data-table {
			border-collapse: collapse;
			font-size: 14px;
			min-width: 537px;
		}

		.data-table th,
		.data-table td {
			border: 1px solid #e1edff;
			padding: 7px 17px;
		}

		.data-table caption {
			margin: 7px;
		}

		/* Table Header */
		.data-table thead th {
			background-color: #508abb;
			color: #FFFFFF;
			border-color: #6ea1cc !important;
			text-transform: uppercase;
		}

		/* Table Body */
		.data-table tbody td {
			color: #353535;
		}

		.data-table tbody td:first-child,
		.data-table tbody td:nth-child(4),
		.data-table tbody td:last-child {
			text-align: right;
		}

		.data-table tbody tr:nth-child(odd) td {
			background-color: #f4fbff;
		}

		.data-table tbody tr:hover td {
			background-color: #ffffa2;
			border-color: #ffff0f;

		}

		.data-table tfoot th:first-child {
			text-align: left;
		}

		.data-table tbody td:empty {
			background-color: #ffcccc;
		}
	</style>
</head>



<style>
	body{
		background: url('table_blur.jpg') no-repeat;
        height: 100%;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
			
	}
    .search-form {
        margin-bottom: 20px;
		margin-top:50px;
		margin-left:42%;
    }

    .search-input {
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 8px;
    }

    .search-button {
        padding: 8px 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    /* Styling for the table */
    .data-table {
        width: 70%;
        border-collapse: collapse;
		text-align: center;
    }

    .data-table th,
    .data-table td {
        padding: 4	px;
        border: 1px solid #ddd;
		text-align: center;
    }

    .data-table th {
        background-color: #f2f2f2;
		text-align: center;
    }
</style>


<body>
    <div class="bg-image"></div>
    <b> <u><h1>Patients Database</h1> </u> </b>
    <form class="search-form  d-flex flex-column justify-content-center" method="POST" action="">
        <input class="search-input" type="text" name="search_name" placeholder="Search by name">
        <button class="search-button" type="submit">Search</button>
    </form>
    <table class="data-table">
		<br>
		<br>
		<br>
        <thead>
            <tr>
				<th>Patient_ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Gender</th>
				<th>Edit</th>
				<th>Report</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to fetch and display table data -->
            <?php
            // Assuming you have established a database connection

            if (isset($_POST['search_name'])) {
                $searchName = strip_tags($_POST['search_name']);
                $searchName = $connect->real_escape_string($searchName);
                $query = "SELECT * FROM user_info WHERE first_name LIKE '%$searchName%'";

                // Execute the query only if $query is defined
                if (isset($query)) {
                    $results = mysqli_query($connect, $query);

                    if ($results) {
                        // Query executed successfully
                        while ($row = mysqli_fetch_array($results)) {
                            ?>
                            <tr>
							    <td style =  "text-align: center"><?php echo $row['id']; ?></td>
                                <td style =  "text-align: center"><?php echo $row['first_name']; ?></td>
                                <td style =  "text-align: center"><?php echo $row['last_name']; ?></td>
                                <td style =  "text-align: center"><?php echo $row['email']; ?></td>
                                <td style =  "text-align: center"><?php echo $row['gender']; ?></td>
								<td style =  "text-align: center"><a href="edit.php?id=<?php echo $row['first_name']; ?> ">Edit</a></td>
								<td style =  "text-align: center"><a href="report.php?id=<?php echo $row['first_name']; ?>">Report</a></td>

                            </tr>
                            <?php
                        }
                    } else {
                        // Query execution failed
                        echo "Error: " . mysqli_error($connect);
                    }
                }
            }
            ?>
            <!-- End of PHP code -->
        </tbody>
    </table>
</body>


</html>