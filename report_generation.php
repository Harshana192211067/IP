<!DOCTYPE html>
<html>
<head>
    <title>Generate Pet Report</title>
    <style>
        body {
            font-family: 'Helvetica Neue', sans-serif;
            background: linear-gradient(135deg, #71b7e6, #9b59b6);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: rgba(255, 255, 255, 0.85);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            width: 100%;
        }
        h2 {
            text-align: center;
            color: #333;
            font-weight: 600;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 15px;
            color: #555;
            font-size: 14px;
        }
        input[type="text"] {
            padding: 12px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #5cb85c;
            outline: none;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 12px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
            transform: scale(1.05);
        }
    </style>
    <script>
        function convertDateFormat(dateString) {
            const parts = dateString.split('/');
            return `${parts[2]}-${parts[1]}-${parts[0]}`;
        }

        function handleFormSubmit(event) {
            const startDateInput = document.getElementById('start_date');
            const endDateInput = document.getElementById('end_date');
            
            // Convert date format
            startDateInput.value = convertDateFormat(startDateInput.value);
            endDateInput.value = convertDateFormat(endDateInput.value);
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Generate Pet Report</h2>
        <form method="post" action="reports.php" onsubmit="handleFormSubmit(event)">
            <label for="start_date">Start Date (dd/mm/yyyy):</label>
            <input type="text" id="start_date" name="start_date" placeholder="dd/mm/yyyy" required><br>
            <label for="end_date">End Date (dd/mm/yyyy):</label>
            <input type="text" id="end_date" name="end_date" placeholder="dd/mm/yyyy" required><br>
            <label for="appointment_type">Appointment Type:</label>
            <input type="text" id="appointment_type" name="appointment_type" required><br>
            <input type="submit" value="Generate Report">
        </form>
    </div>
</body>
</html>
