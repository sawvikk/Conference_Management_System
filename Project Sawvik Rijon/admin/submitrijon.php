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