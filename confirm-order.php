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
        .submitBtn{
            display: block;
            text-align: center;
            padding: 12px;
            background: linear-gradient(45deg, #13d483, #0bbf6a);
            color: #fff;
            font-weight: 600;
            text-decoration: none;
            border: none;
            width: 99%;
            margin: auto;
            box-sizing: border-box;
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
                                <div class="box-text">অর্ডার <br> কনফার্ম করুন</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/4.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <?php
                        if (isset($_POST['submit'])) {
                            
                            $user = QB::table('member')->where('id', $_GET['user_id'])->first();
                            
                            if($member->is_premium==1){
                                $qty = 1;
                            }else{
                                $qty = 7;
                            }
                            
                            if ($_POST['total_qty'] >= $qty) {
                                
                                $total_price = $_POST['total_qty'];
                                
                                $amount = $_POST['total_price'] ?? 0;
                                $user_id = $_GET['user_id'];
                                
                              $balance = $member->jfund_balance;
                              
                              //die();

                                if ($balance >= $amount) {
                                    $time = time();
                                    $data1 = array(
                                        'time' => $time,
                                        'user_id' => $_SESSION['user_id'],
                                        'debit' => $amount,
                                        'from_id' => $user_id,
                                        'type' => 6,
                                        'his' => 17,
                                        'package' => $amount
                                    );
                                    $insert1 = $queryBuilder->table('user_trx_joining')->insert($data1);
                                    if ($insert1) {
                                        
                                        $sql = "UPDATE `member` SET `is_premium` = '1', `update_time` = '1' WHERE `member`.`id` = '$user_id';";
                                        
                                        
                                        
                                        $sql2 = "UPDATE `member` SET `jfund_balance` = `jfund_balance` - '$amount' WHERE `member`.`id` = '{$_SESSION['user_id']}';";
                                        
                                        $mysqli->query($sql2);
                                        
                                        if ($mysqli->query($sql)) {
                                            
                                           
                                          $sponsor1 = find_sponsor($user_id);
                                            
                                            //echo '1';
                                        //die();
                                        
                                            //die();
                                            $refer_amount = 100*$total_price;
                                            
                                            if (member_status($sponsor1) == 1) {
                                                
                                                $refer_amount;
                                                //die();
                                                add_balance_user_refer($sponsor1, $refer_amount, 1, $_SESSION['user_id']);
                                                
                                                
                                                if(biz_alert_active($sponsor1)==1){
                                                
                                                $total_qty=total_order_qty($sponsor1);
                                                $total_qty = $total_qty-7;
                                                
                                                $biz_time=biz_alert_active_time($sponsor1);
                                                
                                                $daytime = biz_alert_active_time_day($sponsor1);
                                                $daytime = $daytime+1;
                                                
                                                $day30 = 86400*$daytime;
                                                
                                                $day_check=$biz_time+$day30;
                                                
                                                $pre_time = time(); 
                                                 
                                                if($pre_time>=$day_check){
                                                    
                                                    $sqlb = "UPDATE `member` SET `biz_day` = `biz_day`+'1' WHERE `member`.`id` = '$sponsor1'";
                                                 $mysqli->query($sqlb);
                                                    
                                                    
                                                    if(biz_alert_active($sponsor1)==1){
                                                        $product = 5;
                                                        }elseif(biz_alert_active2($sponsor1)==1){
                                                          $product = 7;  
                                                        }elseif(biz_alert_active3($sponsor1)==1){
                                                          $product = 10;  
                                                        }elseif(biz_alert_active4($sponsor1)==1){
                                                          $product = 12;  
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
                                                
                                                //die();
                                            }

                                            give_generation2($user_id, $amount, $total_price);
                                        }
                                        // Insert order into database
                                        QB::table('order')->insert([
                                            'user_id' => $_GET['user_id'],
                                            'time' => time(),
                                            'total_qty' => $_POST['total_qty'] ?? 0,
                                            'total_price' => $_POST['total_price'] ?? 0,
                                            'total_point' => $_POST['total_point'] ?? 0,
                                            'name' => $user->name ?? null,
                                            'email' => $user->email ?? null,
                                            'phone' => $user->phone ?? null,
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
                                                'user_id' => $_GET['user_id'],
                                                'order_id' => $orderId,
                                                'product_id' => $productId,
                                                'quantity' => $_POST['quantity'][$index],
                                                'price' => $_POST['price'][$index],
                                            ]);
                                            QB::table('product_stock')->insert([
                                                'user_id' => $_GET['user_id'],
                                                'product_id' => $productId,
                                                'qty' => $_POST['quantity'][$index],
                                                'type' => 'stock_in',
                                                'time' => time(),
                                            ]);
                                        }

                                        echo "<script>localStorage.removeItem('cart');</script>";
                                        echo "<div style='color: red; text-align: center; margin-top: 20px;'>প্রোডাক্ট ডেলিভারি ঠিকানা আপডেট করুন</div>";
                                        
                                        echo "<script>
                                                setTimeout(function(){
                                                    window.location.href = 'order-summary2.php?order_id={$orderId}';
                                                }, 500);
                                            </script>";
                                    }
                                } else {
                                    echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ আপনার একাউন্ট এ পর্যাপ্ত পরিমান অর্থ নাই। অনুগ্রহ করে আবার চেষ্টা করুন </div>";
                                }
                            } else {
                                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার করতে কমপক্ষে ৭টি প্রোডাক্ট নির্বাচন করুন।</div>";
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div id="cart-list">
                                <ul></ul>
                            </div>
                            <input type="hidden" name="total_qty" id="total-qty" value="0">
                            <input type="hidden" name="total_price" id="total-price-hidden" value="0">
                            <input type="hidden" name="total_point" id="total-point-hidden" value="0">

                            <!-- ✅ কার্ট করা প্রোডাক্ট ভিজুয়াল লিস্ট -->
                            <div id="cart-items-list" style="
                                border: 1px solid #1e3a50;
                                overflow: hidden;
                                width: 95%;
                                margin: auto;
                                margin-bottom: 10px !important;
                            "></div>
                            <button type="submit" name="submit" class="submitBtn">
                                অর্ডার সাবমিট করুন
                            </button>
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
    $(document).ready(function () {

    // ✅ cart একবার declare করুন, দুটো function-এর বাইরে
    let cart = localStorage.getItem("cart")
        ? JSON.parse(localStorage.getItem("cart"))
        : {};

    function saveCart() {
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    // ✅ ভিজুয়াল কার্ট রেন্ডার
    function renderCartItems() {
        let $container = $("#cart-items-list");
        $container.empty();

        if ($.isEmptyObject(cart)) {
            $container.append(`
                <div style="text-align:center; padding:20px; color:#888; font-size:14px;">
                    কার্টে কোনো প্রোডাক্ট নেই
                </div>
            `);
            return;
        }

        let ids = Object.keys(cart);

        $.ajax({
            url: 'get_cart_products.php',
            type: 'POST',
            data: { ids: ids },
            dataType: 'json',
            success: function (products) {
                $container.empty();
                $.each(cart, function (id, item) {
                    let product = products[id] || {};
                    let name    = product.name   || 'প্রোডাক্ট #' + id;
                    let imgSrc  = product.images || '';

                    $container.append(`
                        <div class="cart-item-row" data-id="${id}" style="
                            display:flex; align-items:center; gap:10px;
                            padding:8px 10px; border-bottom:1px solid #1e3a50;
                            background:#0d2233;">
                            ${imgSrc ? `<img src="${imgSrc}" style="width:45px;height:45px;object-fit:cover;border-radius:6px;">` : ''}
                            <div style="flex:1;min-width:0;">
                                <div style="color:#fff;font-size:13px;font-weight:500;
                                            white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">
                                    ${name}
                                </div>
                                <div style="color:#12D584;font-size:12px;margin-top:2px;">
                                    মূল্য: <strong>${item.price * item.qty}</strong> টাকা
                                </div>
                            </div>
                        </div>
                    `);
                });
            },
            error: function () {
                $container.append(`
                    <div style="text-align:center;padding:20px;color:#e74c3c;">
                        ডাটা লোড করতে সমস্যা হয়েছে।
                    </div>
                `);
            }
        });
    }

    // ✅ hidden input-এ cart data সেট
    function renderCartList() {
        let $ul = $("#cart-list ul");
        $ul.empty();

        if ($.isEmptyObject(cart)) {
            $ul.append("<li></li>");
            return;
        }

        $.each(cart, function (id, item) {
            $ul.append(`
                <li>
                    <input type="hidden" name="product_id[]" value="${id}">
                    <input type="hidden" name="quantity[]"   value="${item.qty}">
                    <input type="hidden" name="price[]"      value="${item.price}">
                </li>
            `);
        });
    }

    // ✅ summary totals আপডেট
    function updateSummary() {
        let totalItems = 0;
        let totalPrice = 0;

        $.each(cart, function (id, item) {
            totalItems += item.qty;
            totalPrice += item.qty * item.price;
        });

        $("#total-items").text(totalItems);
        $("#total-price").text(totalPrice);
        $("#total-qty").val(totalItems);
        $("#total-price-hidden").val(totalPrice);
        $("#total-point-hidden").val(totalPrice * 0.1);
    }

    // ✅ একসাথে সব চালু করুন
    renderCartItems();
    renderCartList();
    updateSummary();
});
</script>