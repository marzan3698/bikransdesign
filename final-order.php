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
                            <h4 onclick="window.location.href='cart333.php'" style="background-color:#0B2234;color:#fff">
                                কার্টকৃত <br> প্রোডাক্ট
                            </h4>
                        </div>
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
                                
                                <button type="submit" name="submit"
                                    style="background-color:#0B2234;color:#12D584; flex: 0 0 auto; padding:5px 14px; font-size:14px; border: 0px; border-radius: 0px;">
                                    অর্ডার <br> করুন
                                </button>

                            </div>

                            <!-- 🔍 সার্চ বক্স -->
                            <div class="product-search-box">
                                <input type="text" id="productSearch" placeholder="প্রোডাক্ট খুঁজুন...">
                            </div>

                            <div id="productListWrapper">
                                <?php
                                $products = QB::table('product')->limit(3)->get();
                                foreach ($products as $product) {
                                ?>

                                    <div class="product-row" 
                                        data-id="<?= $product->id ?>" 
                                        data-price="<?= $product->main_price ?>"
                                        data-name="<?= strtolower($product->name) ?>">
                                        <div class="product-image2">
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
                            </div>
                            <!-- কোনো প্রোডাক্ট না পেলে এটা দেখাবে -->
                            <p id="noProductFound" style="display:none; text-align:center; padding:20px;">কোনো প্রোডাক্ট পাওয়া যায়নি।</p>

                            <h3 style="padding: 8px;font-weight:bold">সদস্য জয়েনিং তথ্য</h3>
                            <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">রেফারেন্স আইডিঃ-</span>
                                    <input type="text" name="refer" id="refer_id" value="">
                                </div>
                                <span id="refer_id_status" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নতুন নিবন্ধিত মোবাইলঃ-</span>
                                    <input type="text" name="phone" id="phone" value="<?= $phone ?? '' ?>" required>
                                </div>
                                <span id="phone_validation" class="text-danger" style="font-weight: bold;text-align: center; margin-bottom: 10px; display: block;"></span>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">ইউজার আইডি-</span>
                                    <input type="text" id="username" name="username" value="<?= $username ?? '' ?>" readonly required>
                                </div>
                           
                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নামঃ-</span>
                                    <input type="text" name="name" value="<?= $nid['b_name'] ?? '' ?>" required>
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">পিতাঃ-</span>
                                    <input type="text" name="f_name" value="<?= $nid['f_name'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">মাতাঃ-</span>
                                    <input type="text" name="m_name" value="<?= $nid['m_name'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">জন্ম তারিখঃ-</span>
                                    <input type="text" name="dob" value="<?= $nid['dob'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">NID নম্বরঃ-</span>
                                    <input type="text" name="nid_no" value="<?= $nid['nid'] ?? '' ?>" >
                                </div>

                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="division_id" class="cus_select" id="division_id" required>
                                            <option value="">বিভাগঃ </option>
                                            <?php 
                                            $divisions = QB::table('divisions')->orderBy('id', 'asc')->get();
                                            foreach($divisions as $item){ ?>
                                                <option value="<?= $item->id ?>"><?= $item->bn_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <select name="district_id" class="cus_select" id="district_id" required>
                                            <option value="">জেলাঃ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="upazila_id" class="cus_select" id="upazila_id" required>
                                            <option value="">উপজেলাঃ</option>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <select name="union_id" class="cus_select" id="union_id" required>
                                            <option value="">ইউনিয়ন</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">গ্রাম/মহল্লাঃ</span>
                                    <input type="text" name="village" value="" >
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নমিনী নাম-</span>
                                    <input type="text" id="nominee_name" name="nominee_name">
                                </div>

                                <div class="custom-form-group2 white-bg">
                                    <span class="inline-label">নমিনী সম্পর্ক-</span>
                                    <input type="text" id="nominee_relation" name="nominee_relation">
                                </div>

                                <div class="custom-form-group3" style="background-color: white; display:none" >
                                    <span class="inline-label" style="display: block;text-align:center">বিস্তারিত
                                        ঠিকানাঃ-</span><br>
                                    <textarea name="address"
                                        style="display: block; width: 100%; background: transparent; border: none;"><?= $nid['address'] ?? '' ?></textarea>
                                 </div>


                                <div class="image-box square">
                                <label class="image-label" style="color: #12D584;">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color:#12D584;">ছবি আপলোড করুন</span>
                                    <input type="file" name="photo" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <div class="image-box">
                                <label class="image-label">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ফন্ট সাইড
                                        ছবি <br> তুলুন অথবা
                                        আপলোড করুন
                                    </span>
                                    <input type="file" name="image" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <div class="image-box">
                                <label class="image-label">
                                    <img class="previewImage" />
                                    <span class="placeholderText" style="color: #12D584;">জাতীয় পরিচয় পত্রের ব্যাক
                                        সাইড
                                        ছবি <br> তুলুন অথবা
                                        আপলোড করুন</span>
                                    <input type="file" name="nid_back" accept="image/*" required
                                        onchange="previewPhoto(this)">
                                </label>
                            </div>

                            <div class="custom-form-group2 white-bg password-wrapper">
                                <span class="inline-label">পাসওয়ার্ড প্রদান করুন-</span>
                                <div class="password-field">
                                    <input type="password" name="password" id="password" required>
                                    <span class="toggle-password" onclick="togglePassword('password', this)">👁</span>
                                </div>
                            </div>

                            <div class="custom-form-group2 white-bg password-wrapper">
                                <span class="inline-label">পুনরায় পাসওয়ার্ড লিখুন-</span>
                                <div class="password-field">
                                    <input type="password" name="confirm_password" id="confirm_password" required>
                                    <span class="toggle-password" onclick="togglePassword('confirm_password', this)">👁</span>
                                </div>
                            </div>

                            <h3 style="padding: 8px;font-weight:bold">প্রোডাক্ট ডেলিভারি তথ্য</h3>

                          
                              

                            
                            
                            <div class="custom-form-group2 white-bg">
                                <span class="inline-label">নামঃ-</span>
                                <input type="text" name="name" value="<?= $nid['b_name'] ?? '' ?>" required>
                            </div>

                            <div class="custom-form-group2 white-bg">
                                <span class="inline-label">নতুন নিবন্ধিত মোবাইলঃ-</span>
                                <input type="text" name="phone" id="phone" value="<?= $phone ?? '' ?>" required>
                            </div>

                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="del_division_id" class="cus_select" id="del_division_id" required>
                                            <option value="">বিভাগঃ </option>
                                            <?php 
                                            $divisions = QB::table('divisions')->orderBy('id', 'asc')->get();
                                            foreach($divisions as $item){ ?>
                                                <option value="<?= $item->id ?>"><?= $item->bn_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <select name="del_district_id" class="cus_select" id="del_district_id" required>
                                            <option value="">জেলাঃ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="custom-form-group2 white-bg" style="display: flex;gap:5px">
                                    <div style="width: 50%;">
                                        <select name="del_upazila_id" class="cus_select" id="del_upazila_id" required>
                                            <option value="">উপজেলাঃ</option>
                                        </select>
                                    </div>
                                    <div style="width: 50%;">
                                        <select name="del_union_id" class="cus_select" id="del_union_id" required>
                                            <option value="">ইউনিয়ন</option>
                                        </select>
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

        // এখানে cart এর নতুন নাম
        const CART_KEY = "createOrder3";

        function renderCartList() {

            let cart = localStorage.getItem(CART_KEY)
                ? JSON.parse(localStorage.getItem(CART_KEY))
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
        let cart = localStorage.getItem(CART_KEY)
            ? JSON.parse(localStorage.getItem(CART_KEY))
            : {};

        updateSummary();

        function saveCart() {
            localStorage.setItem(CART_KEY, JSON.stringify(cart));
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
                    $("#refer_id_status").text("রেফারেন্স আইডি সঠিক");
                    $("#refer_id_status").css("color", "green");
                } else {
                    $("#refer_id_status").text("রেফারেন্স আইডি সঠিক নয়");
                    $("#refer_id_status").css("color", "red");
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