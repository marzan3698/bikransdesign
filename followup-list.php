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
           
            .deletebtn{
                background: red;
                border: none;
                color: #fff;
                padding: 3px 10px;
                border-radius: 5px;
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
                        style="margin-top: 80px !important; width: 95%; margin: auto; border: 1px solid #222; min-height:calc(100vh - 105px);">
                        <div class="box">
                            <div class="box-text-wrap">
                                <div class="box-text" style="font-size: 18px;">সম্ভাব্য বিজনেস  <br> ডিস্ট্রিবিউটর ফলোআপ তালিকা
                                </div>
                            </div>
                            <div class="box-img-wrap">
                                <img src="images/custom/11.png" alt="" class="box-img" style="width: 150px;">
                            </div>
                        </div>
                        <div style="display: flex; gap: 3px; width: 97.5%; margin: auto; margin-bottom:5px !important">
                            <div style="width: 33%;padding:5px; background: #2ECC71;color:#fff; text-align:center" onclick="window.location.href='distributor-list.php'">
                                ডিস্ট্রিবিউটর
                            </div>
                            <div style="width: 33%;padding:5px; background: #2ECC71;color:#fff; text-align:center" onclick="window.location.href='invite-list.php'">
                                ইনভাইট
                            </div>
                            <div style="width: 33%;padding:5px; background: #2ECC71;color:#fff; text-align:center" onclick="window.location.href='followup-list.php'">
                                ফলোআপ
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['delete'])){
                                $id = $_POST['id'];
                                QB::table('distributor_follow_up')->where('id', $id)->delete();
                                echo '<div class="alert alert-danger">ফলোআপ ডিলেট সফল হয়েছে।</div>';
                            }
                        ?>
                        <?php
                            $limit = 10; // প্রতি পেজে কয়টা ডাটা দেখাবে
                            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                            $page = $page < 1 ? 1 : $page;

                            $offset = ($page - 1) * $limit;

                            // মোট ডাটা
                            $total = QB::table('distributor_follow_up')->count();
                            $totalPages = ceil($total / $limit);

                            // ডাটা আনো
                            $data = QB::table('distributor_follow_up')
                                ->orderBy('id', 'desc')
                                ->where('user_id', $_SESSION['user_id'])
                                ->limit($limit)
                                ->offset($offset)
                                ->get();

                            $sl = $offset + 1;
                            ?>
                        <table class="table table-bordered table-striped table-hover" style="text-align: left;width:98%;margin:auto">
                            <thead>
                                <tr>
                                    <th style="background: #0B2234;">নং</th>
                                    <th style="background: #0B2234;">ডিস্ট্রিবিউটর</th>
                                    <th style="background: #0B2234;">অনন্যা তথ্য</th>
                                    <th style="background: #0B2234;">অ্যাকশন</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $d){ ?>
                                    <?php
                                        $distributor = QB::table('distributor')->where('id', $d->dist_id)->first();
                                    ?>
                                    <tr>
                                        <td style="text-align:left"><?= $sl++; ?></td>
                                        <td style="text-align:left">
                                            <strong>নাম:</strong> <?= $distributor ? $distributor->name : 'N/A'; ?><br>
                                            <strong>ফোন:</strong> <?= $distributor ? $distributor->phone : 'N/A'; ?><br>
                                        </td>
                                        <td style="text-align:left">
                                            <strong>সম্ভাব্য ফলোআপকৃত ডিস্ট্রিবিউটর সাথে সাক্ষাৎ:</strong>
                                            <?php 
                                                if($d->follow_up_type == 1){
                                                    echo 'প্রথম ফলোআপ';
                                                } elseif($d->follow_up_type == 2){
                                                    echo 'দ্বিতীয় ফলোআপ';
                                                } elseif($d->follow_up_type == 3){
                                                    echo 'তৃতীয় ফলোআপ';
                                                }
                                            ?><br>

                                            <strong>সম্ভাব্য ডিস্ট্রিবিউটর ফলোআপ ফলাফল কত ঘন্টা:</strong>
                                            <?= $d->follow_up_time ?><br>

                                            <strong>সম্ভাব্য ডিস্ট্রিবিউটর ফলোআপ চালিয়ে যাবেন:</strong>
                                            <?php 
                                                if($d->follow_up_process == 1){
                                                    echo 'হ্যাঁ';
                                                } elseif($d->follow_up_process == 0){
                                                    echo 'কামিং';
                                                } 
                                            ?><br>
                                            <strong>সম্ভাব্য ডিস্ট্রিবিউটর জয়েন করেছেন:</strong>
                                            <?php 
                                                if($d->is_joined == 1){
                                                    echo 'হ্যাঁ';
                                                } else {
                                                    echo 'না';
                                                }
                                            ?>
                                        </td>
                                        <td style="text-align:left">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= $d->id ?>">
                                                <button type="submit" name="delete" class="btn btn-sm btn-danger deletebtn" onclick="return confirm('Are you sure you want to delete this follow-up?');">ডিলেট</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination">
                                <?php if($page > 1){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page-1 ?>">Prev</a>
                                    </li>
                                <?php } ?>

                                <?php for($i = 1; $i <= $totalPages; $i++){ ?>
                                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                    </li>
                                <?php } ?>

                                <?php if($page < $totalPages){ ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?= $page+1 ?>">Next</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </nav>
                        

                    </nav>
                </div>
            </div>
        </div>


    </div>
</div>
<?php require_once('footer.php'); ?>
