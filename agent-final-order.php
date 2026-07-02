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
            .product-image2 img{
                width: 100px;
                height: 130px;
                border: 2px solid #12d584;
                padding: 8px;
                margin-right: 10px;
            }
        </style>
        <style>
            .product-search-box input {
                width: 88%;
                padding: 10px 15px;
                border: 1px solid #ccc;
                border-radius: 0px;
                font-size: 15px;
                outline: none;
                background: transparent;
                display: block;
                margin: auto;
            }
            .product-search-box input:focus {
                border-color: #888;
            }
             .password-field {
                position: relative;
            }

            .toggle-password {
                position: absolute;
                right: 0px;
                top: 50%;
                transform: translateY(-50%);
                cursor: pointer;
                user-select: none;
            } 
            select{
                background-color: transparent;
                border: none;
            }
            .inline-label{
                color: #0B2234 !important;
            }
            .submitBtn{
                display: block;
                text-align: center;
                padding: 12px;
                background: linear-gradient(45deg, #13d483, #0bbf6a);
                color: #fff;
                font-weight: 600;
                text-decoration: none;
                border: none;
                width: 97%;
                margin: auto;
                box-sizing: border-box;
                margin-bottom: 40px;
            }
        </style>


        <div class="pages">

            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav"
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
                        <div class="box" style="border: 2px solid #12D584;">
                            <div class="box-text-wrap">
                                <div class="box-text">প্রোডাক্ট <br> অর্ডার করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/4.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4 onclick="window.location.href='add-fund.php'" style="background-color:#0B2234;color:#12D584">
                                ফান্ড এড করুন
                            </h4>
                            <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#12D584">
                                ব্যালেন্স: <?php echo $member->jfund_balance; ?>
                            </h4>
                            <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#12D584">
                                রিপোর্ট দেখুন
                            </h4>
                        </div>
                        <div class="date-wrapper2" style="gap: 1px;">
                            <h4 style="background-color:#0B2234;color:#fff">
                                বাচাইকৃত প্রোডাক্ট <br> <span id="total-items">0</span>
                            </h4>
                            <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#fff">
                                মোট প্রোডাক্ট <br> মূল্য-  <span id="total-price">0</span>
                            </h4>
                            <h4 onclick="window.location.href='cart6.php'" style="background-color:#0B2234;color:#fff">
                                কার্টকৃত <br> প্রোডাক্ট
                            </h4>
                        </div>
                        <?php 
                            
                            if(isset($_POST['update'])){

                            $total_price = $_POST['total_qty'];
                            if($total_price < 1){
                                die('<div style="text-align:center;font-size:18px;color:red">অনুগ্রহ করে প্রোডাক্ট সিলেক্ট করুন</div>');
                            }
                            $amount = $_POST['total_price'] ?? 0;
                                
                            $refer = $_POST['refer'];
                            $phone = $_POST['phone'];
                            $name = $_POST['name'];
                            $password = random_int(100000, 999999);
                            $division_id = $_POST['division_id'];
                            $district_id = $_POST['district_id'];
                            $upazila_id = $_POST['upazila_id'];
                            $union_id = $_POST['union_id'];
                            $village = $_POST['village'];
                            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                            // username check 
                            $username = $_POST['username'];
                            $existingUser = QB::table('member')->where('username', $username)->first();
                            if ($existingUser) {
                                die('ইউজার আইডি ইতিমধ্যে ব্যবহৃত হচ্ছে, দয়া করে আবার চেষ্টা করুন।');
                            }

                            if(!$phone){
                                die('অনুগ্রহ করে মোবাইল নম্বর পূরণ করুন।');
                            }
                          
                            if(!$division_id){
                                die('অনুগ্রহ করে বিভাগ সিলেক্ট করুন।');
                            }
                            if(!$district_id){
                                die('অনুগ্রহ করে জেলা সিলেক্ট করুন।');
                            }
                            if(!$upazila_id){
                                die('অনুগ্রহ করে উপজেলা সিলেক্ট করুন।');
                            }
                            if(!$union_id){
                                die('অনুগ্রহ করে ইউনিয়ন সিলেক্ট করুন।');
                            }
                            if(!$village){
                                die('অনুগ্রহ করে গ্রাম পূরণ করুন।');
                            }
   

                            // Check Refer
                            $referUser = QB::table('member')->where('username', $refer)->first();
                            if ($referUser) {
                                $refer_id = $referUser->id;
                            } else {
                                die('রেফারেন্স ভুল হয়েছে।');
                            }

                            // Check Phone
                            $phoneCheck = QB::table('member')->where('phone', $phone)->first();
                            if ($phoneCheck) {
                                die('ফোন নম্বর আগে ব্যবহার হয়েছে। দয়া করে নতুন একটা ফোন নম্বর ব্যবহার করুন।');
                            } else {
                                
          
                                    
                                $insert = QB::table('member')->insert([
                                    'joining_time' => time(),
                                    'name' => $name,
                                    'username' => $_POST['username'], // Unique Username
                                    'phone' => $phone,
                                    'refer_id' => $refer_id,
                                    'password' => $hashedPassword, // Hash Password
                                    'show_password' => $password,
                                    'register_userid' => $_SESSION['user_id'],
                                    'created_agent_id' => $_SESSION['user_id'],
                                ]);

                                if ($insert) {
                                    $insertedUser = QB::table('member')->where('username', $username)->first();
                                    $insertedUserId = $insertedUser->id;
                                    sms_send_joining($phone,$_POST['username'],$password);
                                    

                                $time = time();
                                    $data1 = array(
                                        'time' => $time,
                                        'user_id' => $_SESSION['user_id'],
                                        'debit' => $amount,
                                        'from_id' => $insertedUserId,
                                        'type' => 6,
                                        'his' => 17,
                                        'package' => $amount
                                    );
                                    $insert1 = $queryBuilder->table('user_trx_joining')->insert($data1);
                                    if ($insert1) {
                                        
                                        $sql = "UPDATE `member` SET `is_premium` = '1', `update_time` = '1' WHERE `member`.`id` = '$insertedUserId';";
                                        // $sql2 = "UPDATE `member` SET `jfund_balance` = `jfund_balance` - '$amount' WHERE `member`.`id` = '{$_SESSION['user_id']}';";
                                        // $mysqli->query($sql2);
                                        
                                        if ($mysqli->query($sql)) {
                                            
                                           
                                          $sponsor1 = find_sponsor($insertedUserId);

                                            $refer_amount = 100*$total_price;
                                            
                                            if (member_status($sponsor1) == 1) {
                                                
                                                $refer_amount;
                                                add_balance_user_refer($sponsor1, $refer_amount, 1, $insertedUserId);
                                                
                                                if(biz_alert_active($_SESSION['user_id'])==1){
                                                
                                                $total_qty=total_order_qty($_SESSION['user_id']);
                                                $total_qty = $total_qty-3;
                                                
                                                $biz_time=$member2->biz_alert_time;
                                                
                                                $daytime = $member2->biz_day;
                                                
                                                $active_time_day=30;
                                                
                                                $daytime = $daytime+$active_time_day;
                                                
                                                $day30 = 86400*$daytime;
                                                
                                                $day_check=$biz_time+$day30;
                                                
                                                $pre_time = time(); 
                                                 
                                                if($pre_time>=$day_check){
                                                    
                                                    // echo date('d/m/y',$day_check);

                                                    $sqlb = "UPDATE `member` SET `biz_day` = `biz_day`+'$active_time_day' WHERE `member`.`id` = '{$_SESSION['user_id']}'";
                                                 $mysqli->query($sqlb);
                                                    
                                                    
                                                    if(biz_alert_active($sponsor1)==1){
                                                        $product = 3;
                                                        }elseif(biz_alert_active2($sponsor1)==1){
                                                          $product = 3;  
                                                        }elseif(biz_alert_active3($sponsor1)==1){
                                                          $product = 3;  
                                                        }elseif(biz_alert_active4($sponsor1)==1){
                                                          $product = 3;  
                                                        }
                                                        
                                                    
                                                    
                                                    
                                                    if($total_qty<$product){
                                                        
                                                         $sql1 = "UPDATE `member` SET `bonchito_tk` = `bonchito_tk` + '$refer_amount' WHERE `member`.`id` = '$sponsor1';";
                                                         
                                                    }else{
                                                         $sql1 = "UPDATE `member` SET `balance` = `balance` + '$refer_amount' WHERE `member`.`id` = '$sponsor1';";
                                                    }
                                                    
                                                }else{
                                                    
                                                    $sql1 = "UPDATE `member` SET `balance` = `balance` + '$refer_amount' WHERE `member`.`id` = '$sponsor1';";
                                                }  
                                                    
                                                }else{
                                                     $sql1 = "UPDATE `member` SET `balance` = `balance` + '$refer_amount' WHERE `member`.`id` = '$sponsor1';";
                                                }

                                                $mysqli->query($sql1);

                                            }
                                            
                                            
                                        $totalCommission = $_POST['total_qty'] * 10;
                                        
                                        $sql12 = "UPDATE `member` SET `balance` = `balance` + '$totalCommission' WHERE `member`.`id` = '{$_SESSION['user_id']}';";
                                        $mysqli->query($sql12);
                                    
                                        add_balance_user_refer_agent($_SESSION['user_id'], $totalCommission, 1, $insertedUserId);
                                        
                                        
                                        
                                        $agent_sponsor1 = find_sponsor_agent($_SESSION['user_id']);
                                    
                                    $agent_sponsor12 = find_sponsor_agent1($agent_sponsor1);
                                    
                                    
                                    $sql13 = "UPDATE `member` SET `balance` = `balance` + '$totalCommission' WHERE `member`.`id` = '$agent_sponsor12';";
                                    $mysqli->query($sql13);
                                    
                                    add_balance_agent_refer_agent($agent_sponsor12, $totalCommission, 1, $insertedUserId);
                                        
                                    
                                                $specialProducts = [
                                                            1 => true,
                                                            2 => true,
                                                            3 => true,
                                                            6 => true,
                                                            7 => true,
                                                            27 => true,
                                                            28 => true,
                                                            29 => true,
                                                            30 => true,
                                                            31 => true,
                                                            32 => true,
                                                            45 => true
                                                        ];
                                                        
                                                        foreach ($_POST['product_id'] as $index => $productId) {
                                                        
                                                            if (isset($specialProducts[$productId])) {
                                                                $biz_al_amount  = 15 * $total_price;
                                                                $biz_al_amountm = 25 * $total_price;
                                                            } else {
                                                                $biz_al_amount  = 3 * $total_price;
                                                                $biz_al_amountm = 7 * $total_price;
                                                            }
                                                        
                                                        }
                                                
                                            give_generation2($insertedUserId, $amount, $total_price);
                                            
                                            
                                               // $biz_al_amount = 3*$total_price;
                                                
                                                $biz_alert_count=biz_master_count_active();
                                                
                                                $main_biz = $biz_al_amount/$biz_alert_count;
                                                
                                                biz_alert_all($main_biz,$insertedUserId);
                                                
                                                
                                              //  $biz_al_amountm = 7*$total_price;
                                                
                                                $biz_alert_countm=biz_master_count_active_m();
                                                
                                                $main_bizm = $biz_al_amountm/$biz_alert_countm;
                                                
                                                biz_alert_allm($main_bizm,$insertedUserId);
                                            

                                            
                                            
                                            
                                            
                                        }
                                        // Insert order into database
                                        QB::table('order')->insert([
                                            'user_id' => $insertedUserId,
                                            'time' => time(),
                                            'total_qty' => $_POST['total_qty'] ?? 0,
                                            'total_price' => $_POST['total_price'] ?? 0,
                                            'total_point' => $_POST['total_point'] ?? 0,
                                            'receiver_name' => $_POST['del_name'] ?? null,
                                            'email' => $user->email ?? null,
                                            'receiver_phone' => $_POST['del_phone'] ?? null,
                                            'division' => $division_id,
                                            'district' => $district_id,
                                            'upazilla' => $upazila_id,
                                            'union' => $union_id,
                                            'address' => $village,
                                            'type' => 'agent-nibondhon',
                                            'order_type' => 'agent-nibondhon',
                                            'agent_id' => $_SESSION['user_id'],
                                            'is_agent' => 1,
                                        ]);
                                        $lastOrder = QB::table('order')->orderBy('id', 'desc')->first();
                                        $orderId = 1;
                                        if ($lastOrder) {
                                            $orderId = $lastOrder->id;
                                        } else {
                                            $orderId = 1;
                                        }

                                        // Insert order items
                                        foreach ($_POST['product_id'] as $index => $productId) {
                                            QB::table('order_items')->insert([
                                                'user_id' => $insertedUserId,
                                                'order_id' => $orderId,
                                                'product_id' => $productId,
                                                'quantity' => $_POST['quantity'][$index],
                                                'price' => $_POST['price'][$index],
                                                'is_agent' => 1,
                                                'order_type' => 'agent-nibondhon',
                                                'agent_id' => $_SESSION['user_id'],
                                                'type' => 'agent-nibondhon',
                                            ]);
                                            QB::table('agent_product_stock')->insert([
                                                'user_id' => $_SESSION['user_id'],
                                                'product_id' => $productId,
                                                'qty' => $_POST['quantity'][$index],
                                                'type' => 'stock_out',
                                                'time' => time(),
                                            ]);
                                        }

                                        echo "<script>localStorage.removeItem('cart666');</script>";
                                        
                                        echo "<script>
                                            setTimeout(function(){
                                                window.location.href = 'order-summary.php?order_id={$orderId}';
                                            }, 500);
                                        </script>";
                                    }
                                }
                                
                            }
                        }
                        ?>
                        
                        
                        
                        <form action="" method="post">
                            <div id="cart-list">
                                <ul></ul>
                            </div>
                            <div class="date-wrapper2" style="gap: 0px; display:none">
                                <h4 onclick="window.location.href='#'"
                                    style="border: 1px solid #12D584; font-size:14px; text-align:left;
                                    display:flex; flex-direction:column;
                                    align-items:flex-start; padding-left:10px;">

                                    <div>বাচাইকৃত প্রোডাক্ট পরিমান - <span id="total-items">0</span> টি</div>
                                    <div>মোট মূল্যে - <span id="total-price">0</span> টাকা</div>
                                    <input type="hidden" name="total_qty" id="total-qty" value="0">
                                    <input type="hidden" name="total_price" id="total-price-hidden" value="0">
                                    <input type="hidden" name="total_point" id="total-point-hidden" value="0">
                                </h4>
                                
                                

                            </div>

                            <?php
                            $products = QB::table('product')->orderBy('id', 'desc')->get();
                            foreach ($products as $product) {
                                    $stockIn = QB::table('agent_product_stock')
                                        ->where('user_id', $_SESSION['user_id'])
                                        ->where('product_id', $product->id)
                                        ->where('type', 'stock_in')
                                        ->get();

                                    $stockOut = QB::table('agent_product_stock')
                                        ->where('user_id', $_SESSION['user_id'])
                                        ->where('product_id', $product->id)
                                        ->where('type', 'stock_out')
                                        ->get();

                                    $totalIn = 0;
                                    foreach ($stockIn as $row) {
                                        $totalIn += $row->qty ?? 0;
                                    }

                                    $totalOut = 0;
                                    foreach ($stockOut as $row) {
                                        $totalOut += $row->qty ?? 0;
                                    }

                                    $stock = $totalIn - $totalOut;
                                    // স্টক ০ বা কম হলে skip করবে
                                    if ($stock <= 0) {
                                        continue;
                                    }

                            ?>

                                <div class="product-row" data-id="<?= $product->id ?>" data-price="<?= $product->main_price ?>">
                                    <div class="product-image">
                                        <img src="https://nadmin.bikrans.com/<?= $product->images ?>" alt="">
                                    </div>

                                    <div class="product-info">
                                        <div class="product-title"><?= $product->name ?></div>
                                        <div class="product-price">মূল্য-<?= $product->main_price ?> টাকা</div>
                                        <div>স্টক: <?= $stock ?></div>

                                        <div class="product-action">
                                            <div class="qty-box">
                                                <button type="button" class="qty-btn minus">-</button>
                                                <input type="number" class="qty-input" value="1" min="1" max="<?= $stock ?>">
                                                <button type="button" class="qty-btn plus">+</button>
                                            </div>

                                            <button type="button" class="add-cart">কার্টে যোগ করুন</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>

                            <?php } ?>

                            <h3 style="padding: 8px;font-weight:bold">সদস্য জয়েনিং তথ্য</h3>
                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">রেফারেন্স আইডিঃ-</span>
                                    <input type="text" name="refer" id="refer_id" value="">
                                </div>
                                <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">এনআইডি অনুসারে নামঃ-</span>
                                    <input type="text" name="name" value="<?= $nid['b_name'] ?? '' ?>" required>
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নতুন নিবন্ধিত মোবাইলঃ-</span>
                                    <input type="text" name="phone" id="phone" value="<?= $phone ?? '' ?>" required>
                                </div>
                                <span id="phone_validation" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>
                                <?php
                                    // Generate a unique username
                                    $username3 = 'BIK' . rand(100000, 999999);
                                ?>
                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">ইউজার আইডি-</span>
                                    <input type="text" id="username" name="username" value="<?= $username3 ?? '' ?>" readonly required>
                                </div>

                                <span id="username_validation" class="text-danger" style="font-weight: bold;color:red;text-align: center; margin-bottom: 10px; display: block;">
                                <?php
                                    $exits_username = QB::table('member')->where('username', $username3)->first();
                                    if ($exits_username) {
                                        echo "ইউজার আইডি ইতিমধ্যে ব্যবহৃত হচ্ছে, দয়া করে আবার চেষ্টা করুন।";
                                    }
                                ?>
                            </span>

                             <div style="padding: 8px;font-weight:bold" id="password-check"></div>

                            <h3 style="padding: 8px;font-weight:bold">প্রোডাক্ট ডেলিভারি তথ্য</h3>

                            <div class="custom-form-group2 white-bg">
                                <span class="inline-label">নামঃ-</span>
                                <input type="text" name="del_name" value="" required>
                            </div>

                            <div class="custom-form-group2 white-bg">
                                <span class="inline-label">মোবাইল নম্বর:-</span>
                                <input type="text" name="del_phone" id="del_phone" value="" required>
                            </div>

                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="division_id" class="cus_select" id="del_division_id" required>
                                            <option value="">বিভাগঃ </option>
                                            <?php 
                                            $divisions = QB::table('divisions')->orderBy('id', 'asc')->get();
                                            foreach($divisions as $item){ ?>
                                                <option value="<?= $item->id ?>"><?= $item->bn_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <select name="district_id" class="cus_select" id="del_district_id" required>
                                            <option value="">জেলাঃ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="upazila_id" class="cus_select" id="del_upazila_id" required>
                                            <option value="">উপজেলাঃ</option>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <div class="custom-form-group2 white-bg">
                                            <span class="inline-label">ইউনিয়ন ও পৌরসভা</span>
                                            <input type="text" name="union_id" value="" >
                                        </div>
                                    </div>
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">গ্রাম/মহল্লাঃ</span>
                                    <input type="text" name="village" value="" >
                                </div>

                                <button type="submit" name="update" class="submitBtn">
                                        অর্ডার সাবমিট করুন
                                    </button>

                              
                            </div>
                            
                        </form>

                    </nav>


                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {

        // cart এর নতুন নাম
        const cartKey = "cart666";

        function renderCartList() {
            let cart = localStorage.getItem(cartKey)
                ? JSON.parse(localStorage.getItem(cartKey))
                : {};

            let $ul = $("#cart-list ul");
            $ul.empty();

            if ($.isEmptyObject(cart)) {
                $ul.append("<li></li>");
                return;
            }

            $.each(cart, function(id, item) {
                $ul.append(`
                    <li>
                        <input type="hidden" value="${id}" name="product_id[]" readonly>
                        <input type="hidden" value="${item.qty}" name="quantity[]" readonly>
                        <input type="hidden" value="${item.price}" name="price[]" readonly>
                    </li>
                `);
            });
        }

        renderCartList();

        // localStorage থেকে cart load
        let cart = localStorage.getItem(cartKey)
            ? JSON.parse(localStorage.getItem(cartKey))
            : {};

        updateSummary();

        function saveCart() {
            localStorage.setItem(cartKey, JSON.stringify(cart));
        }

        function updateSummary() {
            let totalItems = 0;
            let totalPrice = 0;

            $.each(cart, function(id, item) {
                totalItems += item.qty;
                totalPrice += item.qty * item.price;
            });

            $("#total-items").text(totalItems);
            $("#total-price").text(totalPrice);
            $("#total-qty").val(totalItems);
            $("#total-price-hidden").val(totalPrice);
            $("#total-point-hidden").val(totalPrice * 0.1);
        }

        // Plus button
        $(document).on("click", ".plus", function() {
            let input = $(this).siblings(".qty-input");
            let value = parseInt(input.val());
            let max = parseInt(input.attr("max"));

            if (value < max) {
                input.val(value + 1);
            } else {
                Swal.fire({
                    showConfirmButton: false,
                    timer: 1200,
                    timerProgressBar: true,
                    text: "সর্বোচ্চ স্টক সীমায় পৌঁছে গেছে!",
                    icon: "warning",
                });
            }
        });

        // Minus button
        $(document).on("click", ".minus", function() {
            let input = $(this).siblings(".qty-input");
            let value = parseInt(input.val());

            if (value > 1) {
                input.val(value - 1);
            }
        });

        // Add to cart
        $(document).on("click", ".add-cart", function() {

            let row = $(this).closest(".product-row");

            let id = row.data("id");
            let price = parseFloat(row.data("price"));
            let qty = parseInt(row.find(".qty-input").val());
            let max = parseInt(row.find(".qty-input").attr("max"));

            let currentQty = cart[id] ? cart[id].qty : 0;

            if (currentQty + qty > max) {
                Swal.fire({
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    text: "স্টকের বেশি পরিমাণ কার্টে যোগ করা যাবে না!",
                    icon: "error",
                });
                return;
            }

            if (cart[id]) {
                cart[id].qty += qty;
            } else {
                cart[id] = {
                    price: price,
                    qty: qty
                };
            }

            saveCart();
            updateSummary();
            renderCartList();

            Swal.fire({
                showConfirmButton: false,
                timer: 1000,
                timerProgressBar: true,
                text: "প্রোডাক্ট সফলভাবে কার্টে যোগ হয়েছে!",
                icon: "success",
            });
        });
    });
</script>

<script>
document.getElementById('productSearch').addEventListener('keyup', function () {
        const keyword = this.value.trim().toLowerCase();
        const rows = document.querySelectorAll('.product-row');
        let found = false;

        rows.forEach(row => {
            const name = row.getAttribute('data-name');
            const divider = row.nextElementSibling; // .divider

            if (name.includes(keyword)) {
                row.style.display = '';
                if (divider && divider.classList.contains('divider')) divider.style.display = '';
                found = true;
            } else {
                row.style.display = 'none';
                if (divider && divider.classList.contains('divider')) divider.style.display = 'none';
            }
        });

        document.getElementById('noProductFound').style.display = found ? 'none' : 'block';
    });
</script>
<script>
    function togglePassword(id, el) {
        var input = document.getElementById(id);
        if (input.type === "password") {
            input.type = "text";
            el.textContent = "🙈";
        } else {
            input.type = "password";
            el.textContent = "👁";
        }
    }
</script>
<script>
    $("#refer_id").on("keyup", function() {
        var refer_id = $(this).val();

        $.ajax({
            url: "ajax/check_refer_id.php",
            method: "POST",
            data: { refer_id: refer_id },
            dataType: "json",
            success: function(response) {
                if (response.exists) {
                    $("#refer_id_status")
                        .html(
                            "রেফারেন্স আইডি সঠিক<br>" +
                            "নাম: " + response.name + "<br>" +
                            "মোবাইল নম্বর: " + response.phone
                        )
                        .css("color", "green");
                } else {
                    $("#refer_id_status")
                        .html("রেফারেন্স আইডি সঠিক নয়")
                        .css("color", "red");
                }
            }
        });
    });

    $("#phone").on("keyup", function() {
        var phone = $(this).val();

        $.ajax({
            url: "ajax/check_phone.php",
            method: "POST",
            data: { phone: phone },
            dataType: "json",
            success: function(response) {
                if (response.exists) {
                    $("#phone_validation").text("এই মোবাইল নম্বরটি ইতিমধ্যে নিবন্ধিত");
                    $("#phone_validation").css("color", "red");
                } else {
                    $("#phone_validation").text("");
                }
            }
        });
    });
    $("#password, #confirm_password").on("keyup", function () {
        var password = $("#password").val();
        var confirmPassword = $("#confirm_password").val();

        if (password.length === 0 && confirmPassword.length === 0) {
            $("#password-check").text("");
            return;
        }

        if (password !== confirmPassword) {
            $("#password-check").text("পাসওয়ার্ড মিলেনি।").css("color", "red");
        } else {
            $("#password-check").text("পাসওয়ার্ড মিলেছে।").css("color", "green");
        }
    });
</script>
<script>
    $(document).ready(function(){

        // Division → District
        $('#division_id').change(function(){
            var division_id = $(this).val();

            $('#district_id').html('<option>Loading...</option>');
            $('#upazila_id').html('<option value="">উপজেলা</option>');

            if(division_id != ''){
                $.ajax({
                    url: "get_districts.php",
                    type: "POST",
                    data: { division_id: division_id },
                    success: function(data){
                        $('#district_id').html(data);
                    }
                });
            }
        });

        // District → Upazila
        $('#district_id').change(function(){
            var district_id = $(this).val();

            $('#upazila_id').html('<option>Loading...</option>');

            if(district_id != ''){
                $.ajax({
                    url: "get_upazilas.php",
                    type: "POST",
                    data: { district_id: district_id },
                    success: function(data){
                        $('#upazila_id').html(data);
                    }
                });
            }
        });

        $('#upazila_id').change(function(){
            var upazila_id = $(this).val();

            $('#union_id').html('<option>Loading...</option>');

            if(upazila_id != ''){
                $.ajax({
                    url: "get_unions.php",
                    type: "POST",
                    data: { upazila_id: upazila_id },
                    success: function(data){
                        $('#union_id').html(data);
                    }
                });
            }
        });

    });
</script>
<script>
    $(document).ready(function(){

        // Division → District
        $('#del_division_id').change(function(){
            var division_id = $(this).val();

            $('#del_district_id').html('<option>Loading...</option>');
            $('#del_upazila_id').html('<option value="">উপজেলা</option>');

            if(division_id != ''){
                $.ajax({
                    url: "get_districts.php",
                    type: "POST",
                    data: { division_id: division_id },
                    success: function(data){
                        $('#del_district_id').html(data);
                    }
                });
            }
        });

        // District → Upazila
        $('#del_district_id').change(function(){
            var district_id = $(this).val();

            $('#del_upazila_id').html('<option>Loading...</option>');

            if(district_id != ''){
                $.ajax({
                    url: "get_upazilas.php",
                    type: "POST",
                    data: { district_id: district_id },
                    success: function(data){
                        $('#del_upazila_id').html(data);
                    }
                });
            }
        });

        $('#del_upazila_id').change(function(){
            var upazila_id = $(this).val();

            $('#del_union_id').html('<option>Loading...</option>');

            if(upazila_id != ''){
                $.ajax({
                    url: "get_unions.php",
                    type: "POST",
                    data: { upazila_id: upazila_id },
                    success: function(data){
                        $('#del_union_id').html(data);
                    }
                });
            }
        });

    });
</script>
<script>
    function previewPhoto(input) {
        const box = input.closest('.image-label');
        const preview = box.querySelector('.previewImage');
        const placeholder = box.querySelector('.placeholderText');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
                placeholder.style.display = 'none';
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>