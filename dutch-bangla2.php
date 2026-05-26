<?php require_once('header.php'); ?>
<div class="statusbar-overlay"></div>

<div class="panel-overlay"></div>

<?php require_once('sidebar.php'); ?>
<div class="panel panel-right panel-reveal">
    <link href="css/custom2.css" rel="stylesheet">
    <div class="user_login_info">

        <div class="user_thumb">
            <div class="user_avatar"><img src="images/avatar.jpg" alt="" title="" /></div>
            <div class="user_details">
                <p>Welcome <span>John Doe</span></p>
            </div>
            <div class="user_social">
                <ul>
                    <li><a href="http://twitter.com/" class="external"><img src="images/icons/green/twitter.png" alt=""
                                title="" /></a></li>
                    <li><a href="http://www.facebook.com/" class="external"><img src="images/icons/green/facebook.png"
                                alt="" title="" /></a></li>
                    <li><a href="http://plus.google.com" class="external"><img src="images/icons/green/gplus.png" alt=""
                                title="" /></a></li>
                </ul>
            </div>
        </div>

        <nav class="user-nav">
            <ul>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/settings.png" alt=""
                            title="" /><span>Account Settings</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/briefcase.png" alt=""
                            title="" /><span>My Account</span></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/message.png" alt=""
                            title="" /><span>Messages</span><strong>12</strong></a></li>
                <li><a href="features.php" class="close-panel"><img src="images/icons/green/love.png" alt=""
                            title="" /><span>Favorites</span><strong>5</strong></a></li>
                <li><a href="index.php" class="close-panel"><img src="images/icons/green/lock.png" alt=""
                            title="" /><span>Logout</span></a></li>
            </ul>
        </nav>
    </div>
</div>

<div class="views">

    <div class="view view-main">

        <style>
            #amount {
                width: 136px;
                background: transparent;
                border: none;
                color: #fff;
            }

            #amount::placeholder {
                color: #fff;
            }
        </style>

        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #0B2234 !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234 !important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 60px !important; width: 95%; margin: auto; border: 1px solid #222;">
                        <div class="box" style="padding: 38px 10px;">
                            <div class="box-text-wrap">
                                <div class="box-text"><span style="color: #17D286;">বিকাশ</span> <br> <span
                                        style="color: #17D286;">ক্যাশ আউট</span>
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/14.svg" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>

                    </nav>
                    <?php
                    $account = QB::table('bank_info')->where('user_id', $_SESSION['user_id'])->where('account_type', 'bank')->first();
                    $amount = isset($_POST['amount']) ? $_POST['amount'] : '0';
                    $balance = $member->balance;
                    $remaining = $balance - $amount;
                    $totalCashOut = QB::table('withdraw_request')
                        ->select(QB::raw('SUM(amount) as total'))
                        ->where('user_id', $_SESSION['user_id'])
                        ->first();

                    $totalCashOut = $totalCashOut->total ?? 0;
                    ?>
                    <?php
                        if (session_status() === PHP_SESSION_NONE) {
                            session_start();
                        }

                        if (!function_exists('generate_csrf_token')) {
                            function generate_csrf_token() {
                                if (empty($_SESSION['csrf_token'])) {
                                    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                                }
                                return $_SESSION['csrf_token'];
                            }
                        }

                        if (isset($_POST['submit'])) {
                            try {
                                if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                                    throw new Exception('CSRF token validation failed');
                                }

                                if (empty($_SESSION['user_id'])) {
                                    throw new Exception('User session invalid or expired');
                                }
                                $user_id = (int)$_SESSION['user_id'];

                                $amount = isset($_POST['amount']) ? trim($_POST['amount']) : '';
                                $amount = htmlspecialchars($amount, ENT_QUOTES, 'UTF-8');
                                $amount = preg_replace("/[^0-9]/", "", $amount);
                                $amount = (int)$amount;


                                $withdraw_type = 'bank';
                                $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8') : '';
                                $account_type = isset($_POST['account_type']) ? htmlspecialchars(trim($_POST['account_type']), ENT_QUOTES, 'UTF-8') : '';
                                $account_number = isset($_POST['account_number']) ? htmlspecialchars(trim($_POST['account_number']), ENT_QUOTES, 'UTF-8') : '';
                                $bank_name = isset($_POST['bank_name']) ? htmlspecialchars(trim($_POST['bank_name']), ENT_QUOTES, 'UTF-8') : '';
                            

                                //$balance_ck = balancee_ck_user($user_id);
                                $balance = $member->balance;

                   

                                if ($amount < 0) {
                                    throw new Exception('Low Balance : ' . CURRENCY . ' ' . $balance . ', Your Withdraw Amount is : ' . CURRENCY . ' ' . $amount);
                                }

                                

                                $mysqli->begin_transaction();

                                try {

                                    if($amount < 500){
                                        die('<p class="alert alert-danger">সর্বনিম্ন ক্যাশআউট এর পরিমান - ৫০০ টাকা</p>');
                                    }
                                    $time = time();

                                    $last_inserted_row = $queryBuilder->table('user_transection')
                                        ->where('user_id', $user_id)
                                        ->orderBy('id', 'desc')
                                        ->first();
                                    
                                    if (!$last_inserted_row) {
                                        throw new Exception('Could not retrieve last transaction');
                                    }

                                    if($balance >= $amount){
                                        $requestData = [
                                            'time' => $time,
                                            'user_id' => $user_id,
                                            'amount' => $amount,
                                            'type' => 5,
                                            'trans_id' => $last_inserted_row->id,
                                            'address' => $address,
                                            'account_type' => $account_type,
                                            'account_number' => $account_number,
                                            'bank_name' => $bank_name,
                                            'status' => 1,
                                            'withdraw_type' => $withdraw_type,
                                        ];

                                        $insert = $queryBuilder->table('withdraw_request')->insert($requestData);

                                        $data1 = [
                                            'time' => $time,
                                            'user_id' => $user_id,
                                            'debit' => $amount,
                                            'from_id' => $user_id,
                                            'type' => 6,
                                            'his' => 36
                                        ];

                                        $insert1 = $queryBuilder->table('user_transection')->insert($data1);
                                        
                                        if (!$insert1) {
                                            throw new Exception('Failed to record transaction');
                                        }

                                        $stmt = $mysqli->prepare("UPDATE `member` SET `balance` = `balance` - ? WHERE `id` = ?");
                                        $stmt->bind_param("ii", $amount, $user_id);
                                        
                                        if (!$stmt->execute()) {
                                            throw new Exception('Failed to update balance');
                                        }

                                        $mysqli->commit();
                                        
                                        echo '<p class="alert alert-success">Withdrawal request submitted successfully</p>';
                                        ?>
                                        <script type="text/javascript">
                                            window.location='withdraw-money.php';
                                        </script>
                                        <?php
                                      
                                    } else {
                                        throw new Exception('আপনার একাউন্টে পর্যাপ্ত পরিমান অর্থ নেই।');
                                    }

                                    
                                    if (!$insert1) {
                                        throw new Exception('Failed to record transaction');
                                    }

                                    
                                      
                                        
                                } catch (Exception $e) {
                                    $mysqli->rollback();
                                    throw $e; 
                                }

                            } catch (Exception $e) {
                                error_log('Withdrawal Error: ' . $e->getMessage());
                                echo '<p class="alert alert-danger">Error: ' . htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8') . '</p>';
                            }
                        }
                        ?>

                    <form action="" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo generate_csrf_token(); ?>">
                        <input type="hidden" name="amount" value="<?= isset($_POST['amount']) ? $_POST['amount'] : '' ?>">
                        <input type="hidden" name="bank_name" value="<?= $account->account_name ?>">
                        <input type="hidden" name="account_number" value="<?= $account->account_number ?>">
                        <input type="hidden" name="address" value="<?= $member->address ?>">
                        <div style="margin:0px 1.4vw;margin-bottom:15px;">
    
                            <div class="new-container" style="width: 85%; margin:auto;margin-top:-5px;">
                                <div style="height: 15px; background:transparent;"></div>
                                <div class="banner" style="margin-bottom: 1px;">
                                    <div class="left-side">
                                        <img src="images/custom/91.png" alt="Logo" />
                                    </div>
    
                                    <div class="right-side">
                                        <span class="voucher-text">ক্যাশ আউট ভাউচার</span>
                                    </div>
                                </div>
                                <div style="background: #FFFFFF;  margin-top:0px; padding: 12px 14px;  font-size: 13px; margin-bottom:15px; color: #000;">
                                    <div
                                        style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 8px;">
                                        <div>
                                            <div style=" font-size: 15px;"><?= $account->account_name ?></div>
                                            <div style="font-size: 12px;"><?= $member->username ?></div>
                                        </div>
                                        <div style="text-align: right; font-size: 12px;">
                                            <div>তারিখ: <?= date('d-m-Y') ?></div>
                                            <div style="border-top: 1px solid #000; margin-top: 3px; padding-top: 3px;">
                                                ভাউচার নং: 003</div>
                                        </div>
                                    </div>
    
                                    <hr style="border: none; border-top: 1px solid #000; margin: 6px 0;">
    
                                    <!-- Fields -->
                                    <div
                                        style="margin-bottom: 6px; border-bottom: 1px solid #81a8ce; padding-bottom: 4px;">
                                        ক্যাশ আউট নম্বর-<?= $account->account_number ?? '' ?></div>
                                    <div
                                        style="margin-bottom: 6px; border-bottom: 1px solid #81a8ce; padding-bottom: 4px;">
                                        ক্যাশ আউট সময়-<?= date('h:i:A') ?></div>
                                    <div
                                        style="margin-bottom: 6px; border-bottom: 1px solid #81a8ce; padding-bottom: 4px;">
                                        ক্যাশ আউট পরিমান- <span class="amountDisplay"><?= isset($_POST['amount']) ? $_POST['amount'] : '0' ?></span></div>
                                    <div
                                        style="margin-bottom: 6px; border-bottom: 1px solid #81a8ce; padding-bottom: 4px;">
                                        অবশিষ্ট ক্যাশ রহিল- <?= $remaining ?? 0 ?></div>
                                    <div
                                        style="margin-bottom: 10px; border-bottom: 1px solid #81a8ce; padding-bottom: 4px;">
                                        এযাবৎ ক্যাশ আউট পরিমান-<?= $totalCashOut  ?></div>
    
                                    <!-- Note -->
                                    <div style="font-size: 10px; margin-bottom: 14px; line-height: 1.6;">
                                        উপরোক্ত তথ্য সঠিক রয়েছে আমি ক্যাশ আউটের জন্য এবং ক্যাশ রিসিভ করার জন্য সম্মত
                                        হলাম
                                    </div>
    
                                    <!-- Signature Row -->
                                    <div
                                        style="display: flex; justify-content: space-between; font-size: 13px;  margin-bottom: 10px;">
                                        <div><button type="submit" name="submit" style="background: transparent; border: none;"> গ্রাহক সাবমিট <span style="color: #12D584;">করুন</span></button></div>
                                        <div>অথোরাইজড</div>
                                    </div>
    
                                    <!-- Footer -->
                                    <div
                                        style="text-align: center; font-size: 13px; color: white; background:#12D584; padding: 5px;">
                                        www.bikrans.com
                                    </div>
    
                                </div>
    
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>