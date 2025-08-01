<?php
function upload_document($file) {
    try {
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];
        $max_size = 5 * 1024 * 1024; // 5MB
        
        if ($file['error'] !== UPLOAD_ERR_OK) {
            error_log("Upload error: " . $file['error']);
            return false;
        }
        
        if ($file['size'] > $max_size || !in_array($file['type'], $allowed_types)) {
            error_log("Invalid file type or size: " . $file['type'] . ", size: " . $file['size']);
            return false;
        }
        
        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $allowed_ext = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];
        if (!in_array($ext, $allowed_ext)) {
            return false;
        }
        
        $filename = bin2hex(random_bytes(16)) . '.' . $ext;
        $target_file = UPLOADS_DIR . $filename;
        
        if (!is_dir(UPLOADS_DIR)) {
            mkdir(UPLOADS_DIR, 0755, true);
        }
        
        if (move_uploaded_file($file['tmp_name'], $target_file)) {
            error_log("File uploaded successfully: " . $filename);
            return $filename;
        }
        
        return false;
    } catch (Exception $e) {
        error_log("Upload exception: " . $e->getMessage());
        return false;
    }
}
?>
