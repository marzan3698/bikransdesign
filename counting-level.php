<?php
$user_id = $_SESSION['user_id'];
$sl = 1;
// সব member একবারেই লোড করুন (single query)
$all_members = QB::table('member')->where('is_premium', 1)->select('id', 'refer_id', 'username', 'name', 'phone', 'joining_time', 'biz_alert')->get();

// refer_id দিয়ে index তৈরি করুন (O(1) lookup)
$member_map = [];
$member_info = [];
foreach ($all_members as $member) {
    $member_map[$member->refer_id][] = $member->id;
    $member_info[$member->id] = $member;
}

/**
 * একটি নির্দিষ্ট level এর সব member ID বের করার function
 */
function getMembersByLevel(array $member_map, int $parent_id): array
{
    return $member_map[$parent_id] ?? [];
}

/**
 * Multiple parents এর জন্য সব children বের করুন
 */
function getMembersForParents(array $member_map, array $parent_ids): array
{
    $children = [];
    foreach ($parent_ids as $pid) {
        if (!empty($member_map[$pid])) {
            foreach ($member_map[$pid] as $child_id) {
                $children[] = $child_id;
            }
        }
    }
    return $children;
}

// Level 1: প্রথম বীজস্তর
$level1_ids = getMembersByLevel($member_map, $user_id);

// Level 2: দ্বিতীয় বৃদ্ধিস্তর
$level2_ids = getMembersForParents($member_map, $level1_ids);

// Level 3: তৃতীয় ফলনস্তর
$level3_ids = getMembersForParents($member_map, $level2_ids);

// Level 4: চতুর্থ প্রবাহস্তর
$level4_ids = getMembersForParents($member_map, $level3_ids);

// Level 5: পঞ্চম সাফল্যস্তর
$level5_ids = getMembersForParents($member_map, $level4_ids);
$level6_ids = getMembersForParents($member_map, $level5_ids);
$level7_ids = getMembersForParents($member_map, $level6_ids);
$level8_ids = getMembersForParents($member_map, $level7_ids);
$level9_ids = getMembersForParents($member_map, $level8_ids);

$counts = [
    count($level1_ids),
    count($level2_ids),
    count($level3_ids),
    count($level4_ids),
    count($level5_ids),
    count($level6_ids),
    count($level7_ids),
    count($level8_ids),
    count($level9_ids),
];
