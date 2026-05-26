<?php 
require_once('header.php');
$days = [
    'Saturday' => 'শনিবার',
    'Sunday' => 'রবিবার',
    'Monday' => 'সোমবার',
    'Tuesday' => 'মঙ্গলবার',
    'Wednesday' => 'বুধবার',
    'Thursday' => 'বৃহস্পতিবার',
    'Friday' => 'শুক্রবার'
];
function bn_number($number) {
    $en = ['0','1','2','3','4','5','6','7','8','9'];
    $bn = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
    return str_replace($en, $bn, $number);
}
?>
<?php
if (!isset($_GET['order_id'])) {
    echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার আইডি পাওয়া যায়নি।</div>";
    die();
}

$order = QB::table('order')->where('id', $_GET['order_id'])->first();
if (!$order) {
    echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার পাওয়া যায়নি।</div>";
    die();
}
?>
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
        #voucher{
            border: 1px solid #222;
            margin-top: 80px !important;
            width: 90%;
            display: block;
            margin: auto;
        }
        #voucher h3{
            margin-top: 20px;
            color: #000;
            border-bottom: 2px solid #000;
            font-weight: 600;
            display: inline-block;
            padding-left: 15px;
            padding-right: 15px;
            padding-bottom: 0;
        }
        #voucher span{
            color: #000;
        }
        .user-info{
            background-color: #99E5E5;
            margin-top: 10px;
            padding-bottom: 10px;
        }
        select{
            width: 90%;
            background: transparent;
            border: none;
            margin-bottom: 5px;
            padding: 5px;
        }
        .cus_input{
            background: transparent;
            border: none;
            padding: 5px;
            margin-left: 5px;
            color: #000;
            width: auto; /* important */
        }

        .cus_input::placeholder{
            color: #000;
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
            width: 99%;
            margin: auto;
            box-sizing: border-box;
        }
       </style>

        <div class="pages">
            <?php
            if (!isset($_GET['order_id'])) {
                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার আইডি পাওয়া যায়নি।</div>";
                die();
            }
            
            $order = QB::table('order')->where('id', $_GET['order_id'])->first();
            if (!$order) {
                echo "<div style='color: red; text-align: center; margin-top: 20px;'>❌ অর্ডার পাওয়া যায়নি।</div>";
                die();
            }
            ?>
            <div data-page="index" class="page homepage" style="background-color: #EEEEEE !important;">
                <div class="page-content homepagecontent">

                    <div class="homenavbar" style="background:#0B2234!important">
                        <h1><span>Bi</span>krans</h1>
                        <a href="home.php" data-panel="left" class="open-panel">
                            <div class="navbar_right"><img src="images/icons/green/menu.png" alt="" title="" /></div>
                        </a>
                    </div>
                    <?php 
                            if(isset($_POST['update'])){
                                $orderId = $_GET['order_id'];
                                $division = $_POST['division_id'];
                                $district = $_POST['district_id'];
                                $upazilla = $_POST['upazila_id'];
                                $receiver_name = $_POST['receiver_name'];
                                $receiver_phone = $_POST['receiver_phone'];
                                $receiver_phone2 = $_POST['receiver_phone2'];
                                $address = $_POST['address'];

                                QB::table('order')->where('id', $orderId)->update([
                                    'division' => $division,
                                    'district' => $district,
                                    'upazilla' => $upazilla,
                                    'receiver_name' => $receiver_name,
                                    'receiver_phone' => $receiver_phone,
                                    'receiver_phone2' => $receiver_phone2,
                                    'address' => $address,
                                ]);

                                QB::table('status_info')->where('order_id', $orderId)->update([
                                    'delivery_status' => 1,
                                ]);

                                $check = QB::table('status_info')->where('order_id', $orderId)->first();
                                if($check && $check->reference_status == 1){
                                    echo "<div style='color: red; text-align: center; margin-top: 20px;font-size:16px'>✅ অর্ডার সফলভাবে সম্পন্ন হয়েছে ✅ </div>";
    
                                    echo "<script>
                                        setTimeout(function(){
                                            window.location.href = 'pre_register.php?order_id={$orderId}';
                                        }, 500);
                                    </script>";
                                }else{
                                    echo "<div style='color: red; text-align: center; margin-top: 20px;font-size:16px'>✅ অর্ডার সফলভাবে সম্পন্ন হয়েছে ✅ </div>";
    
                                    echo "<script>
                                        setTimeout(function(){
                                            window.location.href = 'order-summary.php?order_id={$orderId}';
                                        }, 500);
                                    </script>";
                                }

                            }
                        ?>
                    
                        <form action="" method="post">
                            <div id="voucher">
                                <img src="https://nadmin.bikrans.com/assets/images/zeni.png" class="img-fluid" style="width: 100%;" />
                                <h3 class="title">ইনভয়েস তথ্য</h3><br>
                                <span style="margin-left: 20px;">প্রোডাক্ট ভাউচার নং -<?php echo $order->id; ?></span><br>
                                <span style="margin-left: 20px;">তারিখ <?php echo date('d-m-Y', $order->time); ?> সময় <?php echo date('h:A', $order->time); ?></span>
                                <div class="user-info">
                                    <?php $user = QB::table('member')->where('id', $order->user_id)->first(); ?>
                                    <h3 class="title">ইউজার তথ্য</h3><br>
                                    <span style="margin-left: 20px;">নাম: <?= $user->name ?></span><br>
                                    <span style="margin-left: 20px;">মোবাইল: <?= $user->phone ?></span><br>
                                    <span style="margin-left: 20px;">আইডি: <?= $user->username ?></span><br>
                                </div>
                                <div >
                                    <h3 class="title">ডেলিভারি তথ্য</h3><br>
                                    <?php
                                        $division = QB::table('divisions')->where('id', $order->division)->first();
                                        $districts = QB::table('districts')->where('id', $order->district)->first();
                                        $upazilas = QB::table('upazilas')->where('id', $order->upazilla)->first();
                                    ?>
                                    <div style="margin-left: 20px;">
                                        <div style="display: flex; align-items: center; padding-left: 8px;">
                                            <span>নামঃ</span>
                                            <input type="text" name="receiver_name" class="cus_input" required autocomplete="off">
                                        </div>
                                        <div style="display: flex; align-items: center; padding-left: 8px;">
                                            <span>মোবাইলঃ</span>
                                            <input type="text" name="receiver_phone" class="cus_input" placeholder="" required autocomplete="off">
                                        </div>
                                        
                                        <select name="division_id" class="cus_select" id="division_id" required>
                                            <option value="">বিভাগঃ </option>
                                            <?php 
                                            $divisions = QB::table('divisions')->orderBy('id', 'asc')->get();
                                            foreach($divisions as $item){ ?>
                                                <option value="<?= $item->id ?>"><?= $item->bn_name ?></option>
                                            <?php } ?>
                                        </select>

                                        <select name="district_id" class="cus_select" id="district_id" required>
                                            <option value="">জেলাঃ</option>
                                        </select>

                                        <select name="upazila_id" class="cus_select" id="upazila_id" required>
                                            <option value="">উপজেলাঃ</option>
                                        </select>

                                        <div style="display: flex; align-items: center; padding-left: 8px;">
                                            <span>গ্রাম/মহল্লাঃ</span>
                                            <input type="text" name="address" class="cus_input" required autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                                <?php 
                                    $orderItems = QB::table('order_items')->where('order_id', $_GET['order_id'])->get();
                                    $sl = 1;
                                ?>
                                <div class="user-info">
                                    <h3 class="title" style="margin-bottom: 10px;">অর্ডার তথ্য</h3><br>
                                    <table class="table table-bordered text-center" style="border-collapse: collapse;">
                                        <thead>
                                            <tr>
                                                <th style="background: #7F7F7F; color:#fff; border:1px solid #0B2234">প্রোডাক্ট নাম</th>
                                                <th style="background: #7F7F7F; color:#fff; border:1px solid #0B2234">পরিমান</th>
                                                <th style="background: #7F7F7F; color:#fff; border:1px solid #0B2234">ক্রয় মূল্যে </th>
                                                <th style="background: #7F7F7F; color:#fff; border:1px solid #0B2234">বিক্রয় মূল্যে </th>
                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $totalMainPrice = 0;
                                            $totalPrice = 0;
                                            foreach ($orderItems as $index => $item): 
                                            ?>
                                                <tr>
                                                    <td style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234;text-align:left">
                                                        <?php
                                                        $product = QB::table('product')->where('id', $item->product_id)->first();
                                                        $totalMainPrice += $product->main_price * $item->quantity;
                                                        $totalPrice += $product->price * $item->quantity;
                                                        echo bn_number($sl++) . '. ';
                                                        echo $product ? $product->name : 'Unknown Product';
                                                        ?>
                                                    </td>
                                                    <td style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234"><?php echo $item->quantity; ?>টি</td>
                                                    <td style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234"><?php echo number_format($product->main_price * $item->quantity); ?> টাকা</td>
                                                    <td style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234"><?php echo number_format($product->price * $item->quantity); ?> টাকা</td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <tr>
                                                <th style="text-align: right; background: #99E5E5;color: #0B2234;border:1px solid #0B2234; font-weight: bold;">মোট</th>
                                                <th style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234; font-weight: bold;"><?php echo number_format($order->total_qty); ?> টি </th>
                                                <th style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234; font-weight: bold;"><?= $totalMainPrice ?> টাকা</th>
                                                <th style="background: #99E5E5;color: #0B2234;border:1px solid #0B2234; font-weight: bold;"><?php echo $totalPrice; ?> টাকা</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button type="submit" name="update" class="submitBtn">
                                        অর্ডার সাবমিট করুন
                                    </button>
                                </div>
                            </div>
                        </form>                   
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
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

});
</script>