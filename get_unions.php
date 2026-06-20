<?php
require_once('sadmin/config.php');

if(isset($_POST['upazila_id'])){
    $upazila_id = $_POST['upazila_id'];

    $query = "SELECT * FROM unions WHERE upazilla_id = '$upazila_id' ORDER BY bn_name ASC";
    $result = mysqli_query($mysqli, $query);

    echo '<option value="">ইউনিয়ন</option>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['id'].'">'.$row['bn_name'].'</option>';
    }
}
?>