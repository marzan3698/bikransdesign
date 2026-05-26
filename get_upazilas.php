<?php
require_once('sadmin/config.php');
if(isset($_POST['district_id'])){
    $district_id = $_POST['district_id'];

    $query = "SELECT * FROM upazilas WHERE district_id = '$district_id' ORDER BY bn_name ASC";
    $result = mysqli_query($mysqli, $query);

    echo '<option value="">উপজেলা</option>';

    while($row = mysqli_fetch_assoc($result)){
        echo '<option value="'.$row['id'].'">'.$row['bn_name'].'</option>';
    }
}
?>