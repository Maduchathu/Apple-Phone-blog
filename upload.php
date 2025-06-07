<?php
// Simple upload processing - stores submissions in a JSON file for demo

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadsDir = 'uploads/';
    if (!is_dir($uploadsDir)) {
        mkdir($uploadsDir, 0755, true);
    }

    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));
    $imageName = '';

    if (!$email) {
        die('Invalid email format.');
    }

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image']['tmp_name'];
        $originalName = basename($_FILES['image']['name']);
        $ext = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
        $allowedExt = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowedExt)) {
            $imageName = uniqid('img_') . '.' . $ext;
            move_uploaded_file($tmpName, $uploadsDir . $imageName);
        } else {
            die('Only JPG, JPEG, PNG, GIF files are allowed.');
        }
    }

    // Save data in a JSON file
    $dataFile = 'data/submissions.json';
    if (!is_dir('data')) {
        mkdir('data', 0755, true);
    }

    $existingData = [];
    if (file_exists($dataFile)) {
        $jsonData = file_get_contents($dataFile);
        $existingData = json_decode($jsonData, true) ?: [];
    }

    $newEntry = [
        'name' => $name,
        'email' => $email,
        'subject' => $subject,
        'message' => $message,
        'image' => $imageName,
        'date' => date('Y-m-d H:i:s')
    ];

    $existingData[] = $newEntry;
    file_put_contents($dataFile, json_encode($existingData, JSON_PRETTY_PRINT));

    header('Location: show_uploads.php?success=1');
    exit();
} else {
    header('Location: index.php');
    exit();
}
