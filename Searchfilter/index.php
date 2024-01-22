<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Search Filter</title>
    <style>
        /* Optional: Adjust the form layout */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Style form labels */
label {
    display: block;
    margin-bottom: 8px;
}

/* Style select and input elements */
select,
input[type="range"],
input[type="submit"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 16px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

/* Style submit button */
input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
    transition: background-color 0.3s;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

/* Optional: Style range input */
input[type="range"] {
    width: calc(100% - 16px);
    margin-right: 16px;
}

    </style>
</head>
<body>

<form action="search.php" method="GET">
    <label for="model">Model:</label>
    <select name="model">
        <option value="">All</option>
        <option value="sedan">Sedan</option>
        <option value="suv">SUV</option>
        <option value="hatchback">Hatchback</option>
        <!-- Add other model options as needed -->
    </select>

    <label for="price_range">Price Range (in lakh):</label>
<input type="range" name="price_range" id="price_range" min="0" max="100" step="1" value="0">
<span id="selected_price">0</span> Lakh


    <label for="color">Color:</label>
    <select name="color">
        <option value="red">Red</option>
        <option value="blue">Blue</option>
        <option value="green">Green</option>
        <!-- Add other color options as needed -->
    </select>

    <input type="submit" value="Search">
</form>

</body>
</html>
<script>
    // Get the range input and span element
    const priceRangeInput = document.getElementById('price_range');
    const selectedPriceSpan = document.getElementById('selected_price');

    // Add an event listener to update the span when the range input changes
    priceRangeInput.addEventListener('input', function () {
        selectedPriceSpan.textContent = this.value;
    });
</script>
