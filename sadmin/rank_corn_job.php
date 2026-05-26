<?php
require_once('../master/config.php');
require_once('../master/function.php');

$startDate = strtotime('01 Jan 2024 00:00:00');
$endDate = time();

$FilterDate = [
    'startDate' => $startDate,
    'endDate' => $endDate,
];

// Fetch all users and their related data
$quearyUsers = QB::table('member')->get();
$all_purchases = QB::table('purchase_package')->get();
$quearyBinaryPointDistribution = QB::query("SELECT * FROM `binary_point_distribution` WHERE id IN ( SELECT MAX(id) FROM `binary_point_distribution` GROUP BY user_id )")->get();

$allUsers = setKey(makeUsersWithPurchase($quearyUsers, $all_purchases, $quearyBinaryPointDistribution, $FilterDate));

foreach ($quearyUsers as $sessionUser) {
    $result = calculateDistributionPoint($allUsers, $sessionUser->id, 'datacount');

    $left_point = $result['data']['left_point'];
    $middle_point = $result['data']['middle_point'];
    $right_point = $result['data']['right_point'];

    // Initialize all ranks to 0
    $rank_gm = $rank_dgm = $rank_agm = $rank_rm = $rank_am = $rank_mm = $rank_se = 0;

    if ($left_point >= 1215000000 && $middle_point >= 1215000000 && $right_point >= 607500000) {
        $rank_gm = 1;
    } elseif ($left_point >= 243000000 && $middle_point >= 243000000 && $right_point >= 121500000) {
        $rank_dgm = 1;
    } elseif ($left_point >= 48600000 && $middle_point >= 48600000 && $right_point >= 24300000) {
        $rank_agm = 1;
    } elseif ($left_point >= 9720000 && $middle_point >= 9720000 && $right_point >= 4860000) {
        $rank_rm = 1;
    } elseif ($left_point >= 1620000 && $middle_point >= 1620000 && $right_point >= 1620000) {
        $rank_am = 1;
    } elseif ($left_point >= 270000 && $middle_point >= 270000 && $right_point >= 270000) {
        $rank_mm = 1;
    } elseif ($left_point >= 30000 && $middle_point >= 30000 && $right_point >= 30000) {
        $rank_se = 1;
    }


    // Update the user's rank in the database
    QB::table('member')
        ->where('id', $sessionUser->id)
        ->update([
            'rank_se' => $rank_se,
            'rank_mm' => $rank_mm,
            'rank_am' => $rank_am,
            'rank_rm' => $rank_rm,
            'rank_agm' => $rank_agm,
            'rank_dgm' => $rank_dgm,
            'rank_gm' => $rank_gm,
        ]);
}

echo json_encode(['status' => 'success', 'message' => 'Rank updated successfully']);
