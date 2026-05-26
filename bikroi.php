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
                <div class="page-content homepagecontent" style="overflow-x: hidden !important;">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <nav class="main-nav" style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222">
                        
                        <div class="box" style="border:1px solid #12d584;width:90%; margin: 10px auto;">
                            <div class="box-text-wrap">
                                <div class="box-text">গ্রাহকের <br> নিকট বিক্রয়</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/4.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <?php
                            if (isset($_POST['submit'])) {
                                $time = time();
                                $amount = $_POST['total_price'] ?? 0;
                                $user_id = $_SESSION['user_id'];
                                if ($amount <= 0) {
                                    echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ কার্টে কোন প্রোডাক্ট নেই।</div>";
                                    exit;
                                }
                                if(empty($_POST['customer_name'])) {
                                    echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ গ্রাহকের নাম প্রদান করুন।</div>";
                                    exit;
                                }
                                QB::table('product_sale')->insert([
                                    'time' => $time,
                                    'customer_name' => $_POST['customer_name'] ?? '',
                                    'customer_phone' => $_POST['customer_phone'] ?? '',
                                    'buy_date' => $_POST['buy_date'] ?? '',
                                    'expire_date' => $_POST['expire_date'] ?? '',
                                    'user_id' => $user_id,
                                    'total_qty' => $_POST['total_qty'] ?? 0,
                                    'total_price' => $amount,
                                ]);
                                $lastSale = QB::table('product_sale')->orderBy('id', 'desc')->first();
                                if ($lastSale) {
                                    $saleId = $lastSale->id;
                                } else {
                                    $saleId = 1;
                                }
                                foreach ($_POST['product_id'] as $index => $productId) {
                                    QB::table('product_sale_item')->insert([
                                        'sale_id' => $saleId,
                                        'product_id' => $productId,
                                        'user_id' => $_SESSION['user_id'],
                                        'time' => time(),
                                        'quantity' => $_POST['quantity'][$index],
                                        'price' => $_POST['price'][$index],
                                    ]);
                                    QB::table('product_stock')->insert([
                                        'user_id' => $_SESSION['user_id'],
                                        'product_id' => $productId,
                                        'qty' => $_POST['quantity'][$index],
                                        'type' => 'stock_out',
                                        'time' => time(),
                                    ]);
                                }
                                echo "<script>localStorage.removeItem('cart2');</script>";
                                echo "<div style='color: green; text-align: center; margin-top: 20px;'>✅ প্রোডাক্ট সফলভাবে বিক্রয় হয়েছে।</div>";
                                echo "<script>
                                                setTimeout(function(){
                                                    window.location.href = 'sale_summery.php?sale_id={$saleId}';
                                                }, 2000);
                                            </script>";
                            }   
                        ?>
                        <?php
                           $stock = QB::table('product_stock')
    ->select(
        QB::raw("
            SUM(CASE WHEN type = 'stock_in' THEN qty ELSE 0 END) as total_in,
            SUM(CASE WHEN type = 'stock_out' THEN qty ELSE 0 END) as total_out
        ")
    )
    ->where('user_id', $_SESSION['user_id'])
    ->first();

//echo "In: ".$stock->total_in;
//echo " Out: ".$stock->total_out;
                        ?>
                        <form action="" method="post">
                            <div id="cart-list">
                                <ul></ul>
                            </div>
                            <div class="parent" style="margin-top: 10px;margin-bottom: 10px;">
                                <div class="child one">
                                    <a href="stock.php">প্রোডাক্ট স্টক রয়েছে - <?php echo $stock->total_in-$stock->total_out; ?> টি </a>
                                </div>
                                <div class="child two">
                                    <a href="selling_record.php"> বিক্রয় রিপোর্ট দেখুন </a>
                                </div>
                            </div>
                            <div class="custom-form-group2">
                                <span class="inline-label">পূর্বের গ্রাহক খুঁজতে নম্বর দিয়ে সার্চ করুন-</span>
                                <input type="text" name="customer_phone" id="customer_phone" value="">
                            </div>
                            <div class="custom-form-group2">
                                <span class="inline-label">গ্রাহকের নাম-</span>
                                <input type="text" name="customer_name" id="customer_name" value="">
                            </div>
                            <div class="date-wrapper">
                                <input type="text" name="buy_date" id="buy_date" placeholder="বিক্রয় তারিখ দিন">
                                <input type="text" name="expire_date" id="expire_date" placeholder="প্রোডাক্ট শেষ তারিখ দিন">
                            </div>
                            <div class="parent" style="margin-top: 10px;">
                                <div class="child one">প্রোডাক্ট বিক্রয় সংখ্যা <span id="total-items">0</span></div>
                                <div class="child two">প্রোডাক্টের মূল্য- <span id="total-price">0</span></div>
                                <button type="submit" name="submit" class="child three" style="color: #12d584; background-color:#0B2234;">বিক্রয় করুন</button>
                                <input type="hidden" name="total_qty" id="total-qty" value="0">
                                <input type="hidden" name="total_price" id="total-price-hidden" value="0">
                                <input type="hidden" name="total_point" id="total-point-hidden" value="0">
                            </div>

                            <?php
                                $stock = QB::table('product_stock')
                                    ->select('product_id',
                                        QB::raw("SUM(CASE WHEN type = 'stock_in' THEN qty ELSE 0 END) as total_in"),
                                        QB::raw("SUM(CASE WHEN type = 'stock_out' THEN qty ELSE 0 END) as total_out")
                                    )
                                    ->where('user_id', $_SESSION['user_id'])
                                    ->groupBy('product_id')
                                    ->get();
                                foreach ($stock as $key => $value) {
                                $product = QB::table('product')->where('id', $value->product_id)->first();
                            ?>
                                <div class="product-row" data-id="<?= $product->id ?>" data-price="<?= $product->main_price ?>">
                                    <div class="product-image">
                                        <img src="https://nadmin.proshante.com/<?= $product->images ?>" alt="">
                                    </div>

                                    <div class="product-info">
                                        <div class="product-title"><?= htmlspecialchars($product->name) ?></div>
                                        <div class="product-price">মূল্য-<?= $product->main_price ?> টাকা</div>

                                        <div class="product-action">
                                            <div class="qty-box">
                                                <button type="button" class="qty-btn minus">-</button>
                                                <input type="number" class="qty-input" value="1" min="1" data-max="<?php echo $value->total_in - $value->total_out; ?>">
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
            let cart = localStorage.getItem("cart2") ? JSON.parse(localStorage.getItem("cart2")) : {};
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
        let cart = localStorage.getItem("cart2") ?
            JSON.parse(localStorage.getItem("cart2")) : {};

        updateSummary();

        function saveCart() {
            localStorage.setItem("cart2", JSON.stringify(cart));
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
            let max = parseInt(input.data("max"));

            if (value < max) {
                input.val(value + 1);
            } else {
                Swal.fire({
                    icon: "warning",
                    text: "স্টকে যত আছে তার বেশি যোগ করা যাবে না"
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
            let input = row.find(".qty-input");
            let qty = parseInt(input.val());
            let max = parseInt(input.data("max"));

            if (qty > max) {
                Swal.fire({
                    icon: "warning",
                    text: "স্টকের চেয়ে বেশি পরিমাণ যোগ করা যাবে না"
                });
                input.val(max);
                return;
            }

            if (cart[id]) {
                if (cart[id].qty + qty > max) {
                    Swal.fire({
                        icon: "warning",
                        text: "মোট পরিমাণ স্টক ছাড়িয়ে গেছে"
                    });
                    return;
                }
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
                text: "প্রোডাক্ট সফলভাবে কার্টে যোগ হয়েছে!",
                icon: "success"
            });
        });

    });
</script>
<script>
$(document).ready(function() {

    $("#customer_phone").on("input", function() {

        let phone = $(this).val().trim();

        if (phone === '') {
            $("#customer_name").val('');
            $("#buy_date").val('');
            $("#expire_date").val('');
            return;
        }

        $.ajax({
            url: "ajax/search_customer.php",
            method: "POST",
            data: { phone: phone },
            dataType: "json",
            success: function(response) {

                if (response.status) {
                    $("#customer_name").val(response.data.customer_name);
                    $("#buy_date").val(response.data.buy_date);
                    $("#expire_date").val(response.data.expire_date);
                } else {
                    $("#customer_name").val('');
                    $("#buy_date").val('');
                    $("#expire_date").val('');
                }
            },
            error: function() {
                console.log("Something went wrong");
            }
        });

    });

});
</script>