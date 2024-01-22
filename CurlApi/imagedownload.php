<?php

// URL of the image you want to download
$imageUrl = 'https://m.media-amazon.com/images/I/61dwEaADUYL._AC_UY327_FMwebp_QL65_.jpg';

// Initialize cURL session
$ch = curl_init($imageUrl);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session and get the image data
$imageData = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Error: ' . curl_error($ch);
    exit;
}

// Close cURL session
curl_close($ch);

// Save the image to a local file
file_put_contents('downloaded_image.jpg', $imageData);

echo 'Image downloaded successfully!';

?>
