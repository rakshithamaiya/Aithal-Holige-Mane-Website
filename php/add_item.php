<?php
$conn = new mysqli("localhost", "root", "", "aithal_menu");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['category']) && isset($_POST['item_name'])){

    $category = $_POST['category'];
    $item = $_POST['item_name'];

    $sql = "INSERT INTO menu_items (category, item_name) VALUES ('$category', '$item')";

    if($conn->query($sql) === TRUE){
        echo "success";
    } else {
        echo "error";
    }

} else {
    echo "No data received";
}
?>
