<?php
$conn = new mysqli("localhost", "root", "", "aithal_menu");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM menu_items");

if (!$result) {
    die("Query Failed: " . $conn->error);
}

$lang = isset($_GET['lang']) ? $_GET['lang'] : 'en';

if ($result->num_rows == 0) {

    if ($lang == "kn") {
        echo "ಯಾವುದೇ ಐಟಂಗಳು ಕಂಡುಬಂದಿಲ್ಲ.";
    } if ($lang == "en") {
        echo "No items found.";
    
    }
} else {

    while($row = $result->fetch_assoc()){
        echo "<div style='margin-bottom:8px;'>
                " . $row['item_name'] . " 
                <button onclick='deleteItem(" . $row['id'] . ")'
                        style='color:red;border:none;background:none;cursor:pointer;'>
                    ❌
                </button>
              </div>";
    }

}


$conn->close();
?>
