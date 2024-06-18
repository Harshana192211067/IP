<!DOCTYPE html>
<html>
<head>
    <title>Pet Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 
            800px;
        }
        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #4cae4c;
        }
        .no-results {
            text-align: center;
            color: #333;
            font-weight: 500;
        }
        .error-message {
            text-align: center;
            color: red;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root"; // your database username
        $password = ""; // your database password
        $dbname = "payment_db"; // your database name

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("<div class='error-message'>Connection failed: " . $conn->connect_error . "</div>");
        }

        // Check if the form has been submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate and sanitize inputs
            $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
            $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
            $type = isset($_POST['appointment_type']) ? $_POST['appointment_type'] : '';

            // Check if all inputs are provided
            if (!empty($start_date) && !empty($end_date) && !empty($type)) {
                // Fetch data based on user inputs
                $sql = "SELECT * FROM pay_table WHERE date_of_appointment BETWEEN '$start_date' AND '$end_date' AND appointment_type='$type'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    echo "<h2>Report for $type from $start_date to $end_date</h2>";
                    echo "<table>
                            <tr>
                                <th>User ID</th>
                                <th>Pet Name</th>
                                <th>Appointment Type</th>
                                <th>Caretaker</th>
                                <th>Date of Appointment</th>
                                <th>Fees</th>
                                <th>Payment Type</th>
                            </tr>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["user_id"] . "</td>
                                <td>" . $row["pet_name"] . "</td>
                                <td>" . $row["appointment_type"] . "</td>
                                <td>" . $row["caretaker"] . "</td>
                                <td>" . $row["date_of_appointment"] . "</td>
                                <td>" . $row["fees"] . "</td>
                                <td>" . $row["payment_type"] . "</td>
                              </tr>";
                    }
                    echo "</table>";
                    echo '<a href="indexs.php">Go back to Home</a>';
                } else {
                    echo "<div class='no-results'>No results found for the specified criteria.</div>";
                }
            } else {
                echo "<div class='error-message'>Please provide all input fields.</div>";
            }
        } else {
            echo "<div class='error-message'>Please submit the form.</div>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
