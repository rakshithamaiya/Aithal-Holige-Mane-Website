<?php
$conn = new mysqli("localhost", "root", "", "aithal_menu");

$category = $_GET['category'];

$result = $conn->query("SELECT * FROM menu_items WHERE category='$category'");

while($row = $result->fetch_assoc()){
    echo "<div>" . $row['item_name'] . "</div>";
}


?>
