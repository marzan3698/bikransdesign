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
                                <div class="box-text">প্রোডাক্ট <br> কার্ট লিস্ট</div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/4.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                            <!-- ✅ কার্ট করা প্রোডাক্ট ভিজুয়াল লিস্ট -->
                            <div id="cart-items-list" style="
                                border: 1px solid #1e3a50;
                                overflow: hidden;
                                width: 95%;
                                margin: auto;
                                margin-bottom: 10px !important;
                            "></div>
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

        let cart = localStorage.getItem("cart") ?
            JSON.parse(localStorage.getItem("cart")) : {};

        function saveCart() {
            localStorage.setItem("cart", JSON.stringify(cart));
        }


        // ✅ কার্ট করা প্রোডাক্ট লিস্ট রেন্ডার (ভিজুয়াল)
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

    // cart থেকে সব product ID বের করা
    let ids = Object.keys(cart);

    // AJAX দিয়ে DB থেকে product info আনা
    $.ajax({
        url: 'get_cart_products.php',
        type: 'POST',
        data: { ids: ids },
        dataType: 'json',
        success: function(products) {
    $container.empty();

    $.each(cart, function(id, item) {
        let product = products[id] || {};
        let name    = product.name  || 'প্রোডাক্ট #' + id;
        let imgSrc  = product.images || '';

        $container.append(`
            <div class="cart-item-row" data-id="${id}" style="
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 8px 10px;
                border-bottom: 1px solid #1e3a50;
                background: #0d2233;
            ">
                ${imgSrc 
                    ? `<img src="${imgSrc}" style="width:45px; height:45px; object-fit:cover; border-radius:6px;">` 
                    : ''}
                <div style="flex:1; min-width:0;">
                    <div style="color:#fff; font-size:13px; font-weight:500;
                                white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                        ${name}
                    </div>
                    <div style="color:#12D584; font-size:12px; margin-top:2px;">
                        মূল্য: <strong>${item.price * item.qty}</strong> টাকা
                    </div>
                </div>

                <!-- ✅ Quantity Controls -->
                <div style="display:flex; align-items:center; gap:5px; flex-shrink:0;">
                    <button class="cart-qty-btn" data-id="${id}" data-action="decrease" type="button" style="
                        width:26px; height:26px;
                        background:#1e3a50; color:#fff;
                        border:1px solid #2d5470; border-radius:5px;
                        font-size:16px; line-height:1; cursor:pointer;
                        display:flex; align-items:center; justify-content:center;
                    ">−</button>

                    <span class="cart-qty-display" style="
                        min-width:24px; text-align:center;
                        color:#fff; font-size:13px; font-weight:600;
                    ">${item.qty}</span>

                    <button class="cart-qty-btn" data-id="${id}" data-action="increase" type="button" style="
                        width:26px; height:26px;
                        background:#1e3a50; color:#fff;
                        border:1px solid #2d5470; border-radius:5px;
                        font-size:16px; line-height:1; cursor:pointer;
                        display:flex; align-items:center; justify-content:center;
                    ">+</button>
                </div>

                <button class="cart-delete-btn" data-id="${id}" type="button" style="
                    background:#c0392b; color:#fff;
                    border:none; border-radius:5px;
                    padding:5px 10px; font-size:12px;
                    cursor:pointer; white-space:nowrap; flex-shrink:0;
                ">ডিলেট</button>
            </div>
        `);
    });
},
        error: function() {
            $container.append(`
                <div style="text-align:center; padding:20px; color:#e74c3c;">
                    ডাটা লোড করতে সমস্যা হয়েছে।
                </div>
            `);
        }
    });
}


        // ✅ সব রেন্ডার ফাংশন একসাথে কল করার হেল্পার
        function refreshAll() {
            renderCartItems();
        }

        // প্রথমবার লোড
        refreshAll();

        // ✅ কার্ট থেকে ডিলেট
        $(document).on("click", ".cart-delete-btn", function() {
            let id = $(this).data("id");

            Swal.fire({
                title: "ডিলেট করবেন?",
                text: "এই প্রোডাক্টটি কার্ট থেকে সরিয়ে দেওয়া হবে।",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#c0392b",
                cancelButtonColor: "#0B2234",
                confirmButtonText: "হ্যাঁ, ডিলেট করুন",
                cancelButtonText: "বাতিল",
            }).then((result) => {
                if (result.isConfirmed) {
                    delete cart[id];
                    saveCart();
                    refreshAll();

                    Swal.fire({
                        showConfirmButton: false,
                        timer: 900,
                        text: "প্রোডাক্ট কার্ট থেকে সরানো হয়েছে!",
                        icon: "success",
                    });
                }
            });
        });

        // ✅ Quantity increase / decrease
        $(document).on("click", ".cart-qty-btn", function() {
            let id     = $(this).data("id");
            let action = $(this).data("action");

            if (!cart[id]) return;

            if (action === "increase") {
                cart[id].qty += 1;
            } else if (action === "decrease") {
                if (cart[id].qty > 1) {
                    cart[id].qty -= 1;
                } else {
                    // qty 1 এর নিচে গেলে কার্ট থেকে সরিয়ে দাও
                    delete cart[id];
                    saveCart();
                    refreshAll();
                    return;
                }
            }

            saveCart();

            // শুধু ওই row টা আপডেট করো — পুরো list reload না করে
            let $row = $(this).closest(".cart-item-row");
            $row.find(".cart-qty-display").text(cart[id].qty);
            $row.find(".cart-price-total").text(cart[id].price * cart[id].qty);
        });
    });
</script>