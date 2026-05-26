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
                        <?php
                        if (isset($_POST['submit'])) {
                            
                            $user = QB::table('member')->where('id', $_SESSION['user_id'])->first();
                            
                            if($member->is_premium==1){
                                $qty = 1;
                            }else{
                                $qty = 1;
                            }
                            
                            if ($_POST['total_qty'] >= $qty) {
                                
                                $total_price = $_POST['total_qty'];
                                
                                $amount = $_POST['total_price'] ?? 0;
                                $user_id = $_SESSION['user_id'];
                                
                              $balance = $member->jfund_balance;
                              
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
                                                $total_qty = $total_qty-3;
                                                
                                                $biz_time=biz_alert_active_time($sponsor1);
                                                
                                                $daytime = biz_alert_active_time_day($sponsor1);
                                                
                                                $active_time_day=2;
                                                
                                                $daytime = $daytime+$active_time_day;
                                                
                                                $day30 = 86400*$daytime;
                                                
                                                $day_check=$biz_time+$day30;
                                                
                                                $pre_time = time(); 
                                                 
                                                if($pre_time>=$day_check){
                                                    
                                                    $sqlb = "UPDATE `member` SET `biz_day` = `biz_day`+'$active_time_day' WHERE `member`.`id` = '$sponsor1'";
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
                                                
                                                //die();
                                            }
                                            

                                            give_generation2($user_id, $amount, $total_price);
                                            
                                        }
                                        // Insert order into database
                                        QB::table('order')->insert([
                                            'user_id' => $_SESSION['user_id'],
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
                                                'user_id' => $_SESSION['user_id'],
                                                'order_id' => $orderId,
                                                'product_id' => $productId,
                                                'quantity' => $_POST['quantity'][$index],
                                                'price' => $_POST['price'][$index],
                                            ]);
                                            QB::table('product_stock')->insert([
                                                'user_id' => $_SESSION['user_id'],
                                                'product_id' => $productId,
                                                'qty' => $_POST['quantity'][$index],
                                                'type' => 'stock_in',
                                                'time' => time(),
                                            ]);
                                        }

                                        QB::table('status_info')->insert([
                                            'user_id' => $_SESSION['user_id'],
                                            'order_id' => $orderId,
                                            'order_status' => 1,
                                            'reference_status' => 0,
                                            'delivery_status' => 0,
                                        ]);

                                        echo "<script>localStorage.removeItem('cart');</script>";
                                        echo "<div style='color: red; text-align: center; margin-top: 20px;'>প্রোডাক্ট ডেলিভারি ঠিকানা আপডেট করুন</div>";
                                        
                                        echo "<script>
                                            setTimeout(function(){
                                                window.location.href = 'order-summary3.php?order_id={$orderId}';
                                            }, 500);
                                        </script>";
                                    }
                                    } else {
                                        echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ আপনার একাউন্ট এ পর্যাপ্ত পরিমান অর্থ নাই। অনুগ্রহ করে আবার চেষ্টা করুন </div>";
                                    }
                            } else {
                                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার করতে কমপক্ষে 1 টি প্রোডাক্ট নির্বাচন করুন।</div>";
                            }
                        }
                        ?>
                        <form action="" method="post">
                            <div id="cart-list">
                                <ul></ul>
                            </div>
                            <div class="date-wrapper2" style="gap: 1px;">
                                <h4 onclick="window.location.href='add-fund.php'" style="background-color:#0B2234;color:#12D584">
                                    ফান্ড এড করুন
                                </h4>
                                <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#12D584">
                                    ব্যালেন্স: <?php echo $member->jfund_balance; ?>
                                </h4>
                                <h4 onclick="window.location.href='u-to-u-balance-transfer.php'" style="background-color:#0B2234;color:#12D584">
                                    ব্যালেন্স <br> ট্রান্সফার
                                </h4>
                                <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#12D584">
                                    রিপোর্ট <br> দেখুন
                                </h4>
                            </div>
                            <div class="date-wrapper2" style="gap: 1px;">
                                <h4 style="background-color:#0B2234;color:#fff">
                                    বাচাইকৃত প্রোডাক্ট <br> <span id="total-items">0</span>
                                </h4>
                                <h4 onclick="window.location.href='#'" style="background-color:#0B2234;color:#fff">
                                    মোট প্রোডাক্ট <br> মূল্য-  <span id="total-price">0</span>
                                </h4>
                                <button type="submit" name="submit"
                                    style="background-color:#0B2234;color:#fff; flex: 0 0 auto; padding:5px 14px; font-size:14px; border: 0px; border-radius: 0px;">
                                    অর্ডার করতে <br> ক্লিক করুন
                                </button>
                            </div>
                            <div class="date-wrapper2" style="gap: 1px;">
                                <h4 onclick="window.location.href='cart2.php'" style="background-color:#12D584;color:#fff">
                                    কার্টকৃত প্রোডাক্ট দেখুন
                                </h4>
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

                                <button type="submit" name="submit"
                                    style="background-color:#0B2234;color:#12D584; flex: 0 0 auto; padding:5px 14px; font-size:14px; border: 0px; border-radius: 0px;">
                                    অর্ডার <br> করুন
                                </button>

                            </div>



                            <?php
                            $products = QB::table('product')->get();
                            foreach ($products as $product) {
                            ?>

                                <div class="product-row" data-id="<?= $product->id ?>" data-price="<?= $product->main_price ?>">
                                    <div class="product-image">
                                        <img src="https://nadmin.bikrans.com/<?= $product->images ?>" alt="">
                                    </div>

                                    <div class="product-info">
                                        <div class="product-title"><?= $product->name ?></div>
                                        <div class="product-price">মূল্য-<?= $product->main_price ?> টাকা</div>

                                        <div class="product-action">
                                            <div class="qty-box">
                                                <button type="button" class="qty-btn minus">-</button>
                                                <input type="number" class="qty-input" value="1" min="1">
                                                <button type="button" class="qty-btn plus">+</button>
                                            </div>

                                            <button type="button" class="add-cart">কার্টে যোগ করুন</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="divider"></div>

                            <?php } ?>
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
        function renderCartList() {
            let cart = localStorage.getItem("cart") ? JSON.parse(localStorage.getItem("cart")) : {};
            let $ul = $("#cart-list ul");
            $ul.empty();

            if ($.isEmptyObject(cart)) {
                $ul.append("<li></li>");
                return;
            }

            $.each(cart, function(id, item) {
                $ul.append(`<li>
            <input type="hidden" value="${id}" name="product_id[]" readonly>
            <input type="hidden" value="${item.qty}" name="quantity[]" readonly>
            <input type="hidden" value="${item.price}" name="price[]" readonly></li>`);
            });
        }
        renderCartList();
        // localStorage থেকে কার্ট লোড
        let cart = localStorage.getItem("cart") ?
            JSON.parse(localStorage.getItem("cart")) : {};

        updateSummary();

        function saveCart() {
            localStorage.setItem("cart", JSON.stringify(cart));
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
            $("#total-point-hidden").val(totalPrice * 0.1); // Assuming 1 point = 10% of price
        }

        // Plus button
        $(document).on("click", ".plus", function() {
            let input = $(this).siblings(".qty-input");
            let value = parseInt(input.val());
            input.val(value + 1);
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