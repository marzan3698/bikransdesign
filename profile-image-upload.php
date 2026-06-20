<?php
declare(strict_types=1);

header('Content-Type: application/json');

require_once('sadmin/config.php');

// Configuration
const UPLOAD_DIR      = __DIR__ . '/uploads/profile/';
const UPLOAD_URL_PATH = 'uploads/profile/';
const MAX_FILE_SIZE   = 5 * 1024 * 1024; // 5MB
const ALLOWED_MIME    = [
    'image/jpeg' => 'jpg',
    'image/png'  => 'png',
    'image/webp' => 'webp',
];

function respond(int $httpCode, string $status, string $message, ?string $path = null): void
{
    http_response_code($httpCode);
    $data = ['status' => $status, 'message' => $message];
    if ($path !== null) {
        $data['path'] = $path;
    }
    echo json_encode($data);
    exit;
}

// Only POST allowed
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    respond(405, 'error', 'Invalid request method.');
}

// Check file presence
if (!isset($_FILES['croppedImage']) || $_FILES['croppedImage']['error'] !== UPLOAD_ERR_OK) {
    $uploadErr = $_FILES['croppedImage']['error'] ?? UPLOAD_ERR_NO_FILE;
    $errors = [
        UPLOAD_ERR_INI_SIZE   => 'File exceeds server upload limit.',
        UPLOAD_ERR_FORM_SIZE  => 'File exceeds form upload limit.',
        UPLOAD_ERR_PARTIAL    => 'File was only partially uploaded.',
        UPLOAD_ERR_NO_FILE    => 'No file was uploaded.',
        UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder.',
        UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.',
    ];
    respond(400, 'error', $errors[$uploadErr] ?? 'Unknown upload error.');
}

$file = $_FILES['croppedImage'];

// Validate file size
if ($file['size'] > MAX_FILE_SIZE) {
    respond(400, 'error', 'File exceeds maximum allowed size of 5MB.');
}

// Validate real MIME type using finfo (server-side, can't be spoofed)
$finfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $finfo->file($file['tmp_name']);

if (!array_key_exists($mimeType, ALLOWED_MIME)) {
    respond(400, 'error', 'Invalid file type. Only JPG, PNG, and WEBP images are allowed.');
}

// Validate it's a real image using getimagesize
$imageInfo = getimagesize($file['tmp_name']);
if ($imageInfo === false) {
    respond(400, 'error', 'Uploaded file is not a valid image.');
}

// Create upload directory if it doesn't exist
if (!is_dir(UPLOAD_DIR)) {
    if (!mkdir(UPLOAD_DIR, 0755, true) && !is_dir(UPLOAD_DIR)) {
        respond(500, 'error', 'Failed to create upload directory.');
    }
}

// Generate unique filename
$extension = ALLOWED_MIME[$mimeType];
$uniqueName = bin2hex(random_bytes(16)) . '_' . time() . '.' . $extension;
$destination = UPLOAD_DIR . $uniqueName;
$relativePath = UPLOAD_URL_PATH . $uniqueName;

// Move uploaded file
if (!move_uploaded_file($file['tmp_name'], $destination)) {
    respond(500, 'error', 'Failed to save the uploaded file.');
}

respond(200, 'success', 'Image uploaded and saved successfully!', $relativePath);