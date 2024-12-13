<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if selectedRolls is set in the POST data
    if (isset($_POST['selectedRolls']) && is_array($_POST['selectedRolls'])) {
        // Sanitize and process the selected rolls
        $selectedRolls = array_map('intval', $_POST['selectedRolls']);
        
        // Output the selected rolls (for testing purposes)
        echo "Selected Rolls: " . implode(', ', $selectedRolls);
    } else {
        // No rolls were selected
        echo "No rolls selected.";
    }
} else {
    // Invalid request method
    echo "Invalid request method.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Roll Submission</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
<form action="" method="post" id="rollForm">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Select</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John Doe</td>
                <td>123</td>
                <td><input type="checkbox" name="selectedRolls[]" value="123"></td>
            </tr>
            <tr>
                <td>Jane Smith</td>
                <td>456</td>
                <td><input type="checkbox" name="selectedRolls[]" value="456"></td>
            </tr>
            <tr>
                <td>Bob Johnson</td>
                <td>789</td>
                <td><input type="checkbox" name="selectedRolls[]" value="789"></td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>

    <input type="submit" name="submit_review" value="Submit Review">
</form>

<script>
    // Optional: If you want to check/uncheck all checkboxes
    function toggleCheckboxes() {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function (checkbox) {
            checkbox.checked = !checkbox.checked;
        });
    }
</script>

</body>
</html>