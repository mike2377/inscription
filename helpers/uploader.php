<?php
function upload_document($file) {
    $target_dir = UPLOADS_DIR;
    $filename = time() . '_' . basename($file["name"]);
    $target_file = $target_dir . $filename;

    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        return $filename;
    }
    return false;
}
?>
