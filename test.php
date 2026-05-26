<!-- <?php
require_once('sadmin/config.php');

$withdrawList = "SELECT m.name, m.image, w.user_id, SUM(w.amount) AS total_amount
                FROM withdraw_request w
                JOIN member m ON m.id = w.user_id
                GROUP BY w.user_id
                ORDER BY total_amount DESC
                LIMIT 20";

$result = $mysqli->query($withdrawList);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'Name:' .  $row['name'] . '<br>'; 
        echo 'User ID:' . $row['user_id'] . '<br>';
        echo 'Total Amount:' . $row['total_amount'] . '<br>';
        echo 'Image:' . $row['image'] . '<br>';
    }
} else {
    echo "No records found.";
}
?> -->