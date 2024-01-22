<?php

// Sample subcategories (you can replace this with data from your database)
$subcategories = [];

$category = $_GET['category'];

if ($category == 'fruit') {
    $subcategories = ['Apple', 'Banana', 'Orange'];
} elseif ($category == 'vegetable') {
    $subcategories = ['Carrot', 'Broccoli', 'Spinach'];
}

// Return subcategories as options
foreach ($subcategories as $subcategory) {
    echo "<option value='$subcategory'>$subcategory</option>";
}
?>
