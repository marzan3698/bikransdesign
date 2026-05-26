<?php
class Constant
{

    const STATUS = [
        'active' => 0,
        'inactive' => 1,
    ];

    const PLACEMENT_POINT = [
        'point' => 0,
    ];
    const MAX_MATCHING_DISTRIBUTE = [
        'count' => 16,
    ];

    const POINT_TO_AMOUNT = [
        'amount' => 0, // per 500:500 point to 4 dolar 
    ];

    const PACKAGE = [
        '1' => [
            'id' => 1,
            'price' => 0,
            'bonus' => 0, //bonus point
        ],
        '2' => [
            'id' => 2,
            'price' => 60,
            'bonus' => 60, //bonus point
        ],
    ];

    const COMMISSION_STATUS = [
        'no' => 0,
        'yes' => 1,
    ];

    const WITHDRAW_STATUS = [
        'pending' => 1,
        'approved' => 2,
    ];

    const WITHDRAW_TYPE = [
        'bcash' => 1,
        'nagad' => 2,
        'rocket' => 3,
        'trc20' => 4,
        'bank' => 5,
    ];
}
