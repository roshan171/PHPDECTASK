<?php
// Connection to the database (replace with your actual credentials)
$conn = new mysqli('localhost', 'root', '', 'mydb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Constructing the SQL query based on form inputs
$sql = "SELECT * FROM car_details WHERE 1";

if (!empty($_GET['model'])) {
    $model = $_GET['model'];
    if ($model !== 'all') {
        $sql .= " AND model = '$model'";
    }
}

if (!empty($_GET['price_range'])) {
    $price_range = $_GET['price_range'];
    $sql .= " AND price <= $price_range * 100000"; // Convert range to actual price (assuming lakh as unit)
}

if (!empty($_GET['color'])) {
    $color = $_GET['color'];
    $sql .= " AND color = '$color'";
}


// Execute the query
$result = $conn->query($sql);

// Display the results
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Model: " . $row['model'] . " - Price: $" . $row['price'] . " - Color: " . $row['color'] . "<br>";
    }
} else {
    echo "No results found.";
}

$conn->close();

?>
