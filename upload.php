<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['fileAjax']) && $_FILES['fileAjax']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['fileAjax'];
        
        // Set the target directory
        $targetDir = './upload/';
        
        // Ensure the target directory exists
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        // Get the original file name
        $fileName = basename($file['name']);
        
        // Set the target file path
        $targetFile = $targetDir . $fileName;
        
        // Move the uploaded file to the target directory
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            echo 'File uploaded successfully!';
        } else {
            echo 'There was an error moving the uploaded file.';
        }
    } else {
        echo 'No file uploaded or there was an upload error.';
    }
} else {
    echo 'Invalid request method.';
}
?>
