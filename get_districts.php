<?php
require_once('sadmin/config.php');

if(isset($_POST['division_id'])){
    $division_id = $_POST['division_id'];

    $query = "SELECT * FROM districts WHERE division_id = '$division_id' ORDER BY bn_name ASC";
    $result = mysqli_query($mysqli, $query);

    echo '<option value="">জেলা</option>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['id'].'">'.$row['bn_name'].'</option>';
    }
}
?>