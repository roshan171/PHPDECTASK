<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Input Demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body class="container">

<label for="category">Select Category:</label>
<select id="category" onchange="loadSubcategories()">
    <option value="fruit">Fruit</option>
    <option value="vegetable">Vegetable</option>
</select>

<label for="subcategory">Select Subcategory:</label>
<select id="subcategory"></select>

<script>
function loadSubcategories() {
    var category = $('#category').val();

    // Make an AJAX request to get subcategories based on the selected category
    $.ajax({
        type: 'GET',
        url: 'get_subcategories.php', // Your PHP file to handle the request
        data: { category: category },
        success: function(response) {
            $('#subcategory').html(response);
        }
    });
}

// Load subcategories on page load
$(document).ready(function() {
    loadSubcategories();
});
</script>

</body>
</html>
