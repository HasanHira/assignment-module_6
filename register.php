<?php
session_start();

// Define a constant for the directory where uploaded files will be stored
define('UPLOAD_DIR', 'uploads/');

// Define a function to generate a unique filename
function generateFilename($file_extension) {
    $timestamp = (new DateTime())->getTimestamp();
    $random_number = mt_rand(1000, 9999);
    return $timestamp . '_' . $random_number . '.' . $file_extension;
}

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Get form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validate form data
    if (empty($name) || empty($email) || empty($password)) {
        die('All fields are required.');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email address.');
    }

    if ($_FILES['profile_pic']['error'] != UPLOAD_ERR_OK) {
        die('Error uploading file.');
    }

    $file_extension = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
    if (!in_array($file_extension, ['jpg', 'jpeg', 'png'])) {
        die('Invalid file type. Only JPG, JPEG, and PNG files are allowed.');
    }

    // Save profile picture to server
    $filename = generateFilename($file_extension);
    $target_path = UPLOAD_DIR . $filename;
    if (!move_uploaded_file($_FILES['profile_pic']['tmp_name'], $target_path)) {
        die('Error saving file to server.');
    }

    // Add user data to CSV file
    $user_data = [$name, $email, $filename, (new DateTime())->format('Y-m-d H:i:s')];
    $fp = fopen('users.csv', 'a');
    fputcsv($fp, $user_data);
    fclose($fp);

    // Set session and cookie data
    $_SESSION['name'] = $name;
    setcookie('name', $name, time() + (86400 * 30), '/'); // Cookie expires in 30 days

    // Redirect to success page
    header('Location: success.php');
    exit;
}
