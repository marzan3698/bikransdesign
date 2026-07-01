<?php
$host = "localhost";
$username = "bikrans_main"; // আপনার ডাটাবেজ ইউজারনেম
$password = "bikrans_main";     // আপনার ডাটাবেজ পাসওয়ার্ড
$dbname = "bikrans_main"; // আপনার ডাটাবেজ নাম

// ডাটাবেজ কানেকশন
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// অ্যাপ থেকে POST মেথডে পাঠানো ডাটা রিসিভ করা
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender = $_POST['sender'];
    $message = $_POST['message'];
    $time = time();

    if (!empty($sender) && !empty($message)) {
        $stmt = $conn->prepare("INSERT INTO received_sms (sender_number, sms_text, time) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $sender, $message, $time);
        
        if ($stmt->execute()) {
            echo json_encode(array("status" => "success", "message" => "SMS Synced Successfully"));
        } else {
            echo json_encode(array("status" => "error", "message" => "Failed to save"));
        }
        $stmt->close();
    }
}
$conn->close();
?>