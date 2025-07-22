<?php
// Define the folder to save recordings
$targetDir = __DIR__ . '/recordings/';

// Check if the 'recordings' folder exists; if not, create it
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true); // Create the folder with full permissions
}

// Check if a file was uploaded
if (isset($_FILES['videoFile']) && $_FILES['videoFile']['error'] == UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['videoFile']['tmp_name'];
    $fileName = $_FILES['videoFile']['name'];

    // Create a unique file name to avoid overwriting
    $uniqueFileName = time() . '_' . $fileName;

    // Set the target path for the file
    $targetFilePath = $targetDir . $uniqueFileName;

    // Move the uploaded file to the target folder
    if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
        echo json_encode(['status' => 'success', 'message' => 'Recording saved successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to move the recording to the target folder.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No video file was uploaded or there was an upload error.']);
}
?>
