<?php
$conn = new mysqli("localhost", "root", "", "aithal_menu");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (!isset($_POST['id'])) {
    die("No ID received");
}

$id = intval($_POST['id']);

$stmt = $conn->prepare("DELETE FROM menu_items WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "success";
    } else {
        echo "No rows deleted";
    }
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
